<?php

namespace App\Http\Controllers\Payroll\EmployeeStatus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Payroll\EmployeeStatus\Grade;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;
class GradeController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $grade_list = Grade::where('ESGRHMarkForDeletion', '!=', 1)->get();
        $grade_delete_list = Grade::where('ESGRHMarkForDeletion', 1)->get();
        return view('payroll.employeeStatus.grade.grade', compact('grade_list', 'grade_delete_list'));
    }
    public function add(Request $request)
    {
        return view('payroll.employeeStatus.grade.add_grade');
    }
    public function edit_grade(Request $request)
    {
        $grade = Grade::where('id', Crypt::decryptString($request->id))->first();
        return view('payroll.employeeStatus.grade.edit_grade', compact('grade'));
    }
    public function submit_grade(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ESGRHGradeId' => 'required|min:2|max:10|unique:t11903l02,ESGRHGradeId,' . $request->id,
                'ESGRHDesc1'      => 'required|max:100',
                'ESGRHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $grade_data = new Grade();
            if ($request->id != null) {
                //update
                $grade_data = Grade::find($request->id);
            }

            $grade_data->ESGRHGradeId = $request->ESGRHGradeId;
            $grade_data->ESGRHDesc1 = $request->ESGRHDesc1;
            $grade_data->ESGRHDesc2 = $request->ESGRHDesc2;
            $grade_data->ESGRHBiDesc = $request->ESGRHBiDesc;
            $grade_data->ESGRHUser = Auth::user()->name;
            // ESGRHUser=Auth::user()->id;
            $grade_data->ESGRHLastCreated = now();
            $grade_data->ESGRHLastUpdated = now();
            $grade_data->save();


            if ($grade_data) {
                return response()->json(['status' => 'success', 'data' => $grade_data, 'updateMode' => 'Updated']);
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


    public function delete_grade_list()
    {
        $delete_list = Grade::where('ESGRHMarkForDeletion', 1)->get();
        return view('payroll.employeeStatus.grade.delete_grade_list', compact('delete_list'));
    }


    public function grade_restore(Request $request)
    {
        // dd($request->all());
        try {
            $grade = Grade::find($request->id);
            $request->action == 'delete' ? $grade->ESGRHMarkForDeletion = 1 : $grade->ESGRHMarkForDeletion = 0;

            $grade->ESGRHDeletedAt = now();
            $grade->save();

            if ($grade) {
                return response()->json(['status' => 'success', 'data' => $grade]);
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

    public function getGradeData($id)
    {
        try {
            return Grade::where('id', $id)->first();
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

