<?php

namespace App\Http\Controllers\Config\GeneralMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Config\GeneralMaster\Nationality;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;

class NationalityController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $nationality_list = Nationality::where('GMNAHMarkForDeletion', '!=', 1)->get();
        $nationality_delete_list = Nationality::where('GMNAHMarkForDeletion', 1)->get();
        return view('config.generalmaster.nationality.nationality', compact('nationality_list', 'nationality_delete_list'));
    }
    public function add(Request $request)
    {
        return view('config.generalmaster.nationality.add_nationality');
    }
    public function edit_nationality(Request $request)
    {
        $nationality = Nationality::where('id', Crypt::decryptString($request->id))->first();
        return view('config.generalmaster.nationality.edit_nationality', compact('nationality'));
    }
    public function submit_nationality(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'GMNAHNationalityId' => 'required|min:2|max:10|unique:t11901l04,GMNAHNationalityId,' . $request->id,
                'GMNAHDesc1'      => 'required|max:100',
                'GMNAHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $nationality_data = new Nationality();
            if ($request->id != null) {
                //update
                $nationality_data = Nationality::find($request->id);
            }

            $nationality_data->GMNAHNationalityId = $request->GMNAHNationalityId;
            $nationality_data->GMNAHDesc1 = $request->GMNAHDesc1;
            $nationality_data->GMNAHDesc2 = $request->GMNAHDesc2;
            $nationality_data->GMNAHBiDesc = $request->GMNAHBiDesc;
            $nationality_data->GMNAHUser = Auth::user()->name;
            // GMNAHUser=Auth::user()->id;
            $nationality_data->GMNAHLastCreated = now();
            $nationality_data->GMNAHLastUpdated = now();
            $nationality_data->save();


            if ($nationality_data) {
                return response()->json(['status' => 'success', 'data' => $nationality_data, 'updateMode' => 'Updated']);
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


    public function delete_nationality_list()
    {
        $delete_list = Nationality::where('GMNAHMarkForDeletion', 1)->get();
        return view('config.generalmaster.nationality.delete_nationality_list', compact('delete_list'));
    }


    public function nationality_restore(Request $request)
    {
        // dd($request->all());
        try {
            $nationality = Nationality::find($request->id);
            $request->action == 'delete' ? $nationality->GMNAHMarkForDeletion = 1 : $nationality->GMNAHMarkForDeletion = 0;

            $nationality->GMNAHDeletedAt = now();
            $nationality->save();

            if ($nationality) {
                return response()->json(['status' => 'success', 'data' => $nationality]);
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
}

