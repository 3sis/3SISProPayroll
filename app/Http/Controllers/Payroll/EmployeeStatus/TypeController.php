<?php

namespace App\Http\Controllers\Payroll\EmployeeStatus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Payroll\EmployeeStatus\Type;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;
class TypeController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $type_list = Type::where('ESTYHMarkForDeletion', '!=', 1)->get();
        $type_delete_list = Type::where('ESTYHMarkForDeletion', 1)->get();
        return view('payroll.employeeStatus.type.type', compact('type_list', 'type_delete_list'));
    }
    public function add(Request $request)
    {
        return view('payroll.employeeStatus.type.add_type');
    }
    public function edit_type(Request $request)
    {
        $type = Type::where('id', Crypt::decryptString($request->id))->first();
        return view('payroll.employeeStatus.type.edit_type', compact('type'));
    }
    public function submit_type(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ESTYHTypeId' => 'required|min:2|max:10|unique:t11903l04,ESTYHTypeId,' . $request->id,
                'ESTYHDesc1'      => 'required|max:100',
                'ESTYHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $type_data = new Type();
            if ($request->id != null) {
                //update
                $type_data = Type::find($request->id);
            }

            $type_data->ESTYHTypeId = $request->ESTYHTypeId;
            $type_data->ESTYHDesc1 = $request->ESTYHDesc1;
            $type_data->ESTYHDesc2 = $request->ESTYHDesc2;
            $type_data->ESTYHBiDesc = $request->ESTYHBiDesc;
            $type_data->ESTYHUser = Auth::user()->name;
            // ESTYHUser=Auth::user()->id;
            $type_data->ESTYHLastCreated = now();
            $type_data->ESTYHLastUpdated = now();
            $type_data->save();


            if ($type_data) {
                return response()->json(['status' => 'success', 'data' => $type_data, 'updateMode' => 'Updated']);
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


    public function delete_type_list()
    {
        $delete_list = Type::where('ESTYHMarkForDeletion', 1)->get();
        return view('payroll.employeeStatus.type.delete_type_list', compact('delete_list'));
    }


    public function type_restore(Request $request)
    {
        // dd($request->all());
        try {
            $type = Type::find($request->id);
            $request->action == 'delete' ? $type->ESTYHMarkForDeletion = 1 : $type->ESTYHMarkForDeletion = 0;

            $type->ESTYHDeletedAt = now();
            $type->save();

            if ($type) {
                return response()->json(['status' => 'success', 'data' => $type]);
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

    public function getTypeData($id)
    {
        try {
            return Type::where('id', $id)->first();
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


