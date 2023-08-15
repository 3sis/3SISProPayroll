<?php

namespace App\Http\Controllers\Payroll\EmployeeStatus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Payroll\EmployeeStatus\Department;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;


class DepartmentController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $department_list = Department::where('ESDPHMarkForDeletion', '!=', 1)->get();
        $department_delete_list = Department::where('ESDPHMarkForDeletion', 1)->get();
        return view('payroll.employeeStatus.department.department', compact('department_list', 'department_delete_list'));
    }
    public function add(Request $request)
    {
        return view('payroll.employeeStatus.department.add_department');
    }
    public function edit_department(Request $request)
    {
        $department = Department::where('id', Crypt::decryptString($request->id))->first();
        return view('payroll.employeeStatus.department.edit_department', compact('department'));
    }
    public function submit_department(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ESDPHDepartmentId' => 'required|min:2|max:10|unique:t11903l03,ESDPHDepartmentId,' . $request->id,
                'ESDPHDesc1'      => 'required|max:100',
                'ESDPHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $department_data = new Department();
            if ($request->id != null) {
                //update
                $department_data = Department::find($request->id);
            }

            $department_data->ESDPHDepartmentId = $request->ESDPHDepartmentId;
            $department_data->ESDPHDesc1 = $request->ESDPHDesc1;
            $department_data->ESDPHDesc2 = $request->ESDPHDesc2;
            $department_data->ESDPHBiDesc = $request->ESDPHBiDesc;
            $department_data->ESDPHUser = Auth::user()->name;
            // ESDPHUser=Auth::user()->id;
            $department_data->ESDPHLastCreated = now();
            $department_data->ESDPHLastUpdated = now();
            $department_data->save();


            if ($department_data) {
                return response()->json(['status' => 'success', 'data' => $department_data, 'updateMode' => 'Updated']);
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


    public function delete_department_list()
    {
        $delete_list = Department::where('ESDPHMarkForDeletion', 1)->get();
        return view('payroll.employeeStatus.department.delete_department_list', compact('delete_list'));
    }


    public function department_restore(Request $request)
    {
        // dd($request->all());
        try {
            $department = Department::find($request->id);
            $request->action == 'delete' ? $department->ESDPHMarkForDeletion = 1 : $department->ESDPHMarkForDeletion = 0;

            $department->ESDPHDeletedAt = now();
            $department->save();

            if ($department) {
                return response()->json(['status' => 'success', 'data' => $department]);
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

    public function getDepartmentData($id)
    {
        try {
            return Department::where('id', $id)->first();
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

