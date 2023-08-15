<?php

namespace App\Http\Controllers\Payroll\EmployeeStatus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Payroll\EmployeeStatus\Designation;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;
class DesignationController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $designation_list = Designation::where('ESDEHMarkForDeletion', '!=', 1)->get();
        $designation_delete_list = Designation::where('ESDEHMarkForDeletion', 1)->get();
        return view('payroll.employeeStatus.designation.designation', compact('designation_list', 'designation_delete_list'));
    }
    public function add(Request $request)
    {
        return view('payroll.employeeStatus.designation.add_designation');
    }
    public function edit_designation(Request $request)
    {
        $designation = Designation::where('id', Crypt::decryptString($request->id))->first();
        return view('payroll.employeeStatus.designation.edit_designation', compact('designation'));
    }
    public function submit_designation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ESDEHDesignationId' => 'required|min:2|max:10|unique:t11903l01,ESDEHDesignationId,' . $request->id,
                'ESDEHDesc1'      => 'required|max:100',
                'ESDEHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $designation_data = new Designation();
            if ($request->id != null) {
                //update
                $designation_data = Designation::find($request->id);
            }

            $designation_data->ESDEHDesignationId = $request->ESDEHDesignationId;
            $designation_data->ESDEHDesc1 = $request->ESDEHDesc1;
            $designation_data->ESDEHDesc2 = $request->ESDEHDesc2;
            $designation_data->ESDEHBiDesc = $request->ESDEHBiDesc;
            $designation_data->ESDEHUser = Auth::user()->name;
            // ESDEHUser=Auth::user()->id;
            $designation_data->ESDEHLastCreated = now();
            $designation_data->ESDEHLastUpdated = now();
            $designation_data->save();


            if ($designation_data) {
                return response()->json(['status' => 'success', 'data' => $designation_data, 'updateMode' => 'Updated']);
            } else {
                return response()->json(['status' => 'error']);
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'technical_error']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->error_log($e);
            return response()->json(['status' => 'technical_error']);
        }
    }


    public function delete_designation_list()
    {
        $delete_list = Designation::where('ESDEHMarkForDeletion', 1)->get();
        return view('payroll.employeeStatus.designation.delete_designation_list', compact('delete_list'));
    }


    public function designation_restore(Request $request)
    {
        // dd($request->all());
        try {
            $designation = Designation::find($request->id);
            $request->action == 'delete' ? $designation->ESDEHMarkForDeletion = 1 : $designation->ESDEHMarkForDeletion = 0;

            $designation->ESDEHDeletedAt = now();
            $designation->save();

            if ($designation) {
                return response()->json(['status' => 'success', 'data' => $designation]);
            } else {
                return response()->json(['status' => 'error']);
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'technical_error']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->error_log($e);
            return response()->json(['status' => 'technical_error']);
        }
    }

    public function getDesignationData($id)
    {
        try {
            return Designation::where('id', $id)->first();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'technical_error']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->error_log($e);
            return response()->json(['status' => 'technical_error']);
        }
    }
}

