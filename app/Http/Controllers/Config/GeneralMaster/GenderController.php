<?php

namespace App\Http\Controllers\Config\GeneralMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Config\GeneralMaster\Gender;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;

class GenderController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $gender_list = Gender::where('GMGDHMarkForDeletion', '!=', 1)->get();
        $gender_delete_list = Gender::where('GMGDHMarkForDeletion', 1)->get();
        return view('config.generalmaster.gender.gender', compact('gender_list', 'gender_delete_list'));
    }
    public function add(Request $request)
    {
        return view('config.generalmaster.gender.add_gender');
    }
    public function edit_gender(Request $request)
    {
        $gender = Gender::where('id', Crypt::decryptString($request->id))->first();
        return view('config.generalmaster.gender.edit_gender', compact('gender'));
    }
    public function submit_gender(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'GMGDHGenderId' => 'required|min:2|max:10|unique:t11901l02,GMGDHGenderId,' . $request->id,
                'GMGDHDesc1'      => 'required|max:100',
                'GMGDHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $gender_data = new Gender();
            if ($request->id != null) {
                //update
                $gender_data = Gender::find($request->id);
            }

            $gender_data->GMGDHGenderId = $request->GMGDHGenderId;
            $gender_data->GMGDHDesc1 = $request->GMGDHDesc1;
            $gender_data->GMGDHDesc2 = $request->GMGDHDesc2;
            $gender_data->GMGDHBiDesc = $request->GMGDHBiDesc;
            $gender_data->GMGDHUser = Auth::user()->name;
            // GMGDHUser=Auth::user()->id;
            $gender_data->GMGDHLastCreated = now();
            $gender_data->GMGDHLastUpdated = now();
            $gender_data->save();


            if ($gender_data) {
                return response()->json(['status' => 'success', 'data' => $gender_data, 'updateMode' => 'Updated']);
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


    public function delete_gender_list()
    {
        $delete_list = Gender::where('GMGDHMarkForDeletion', 1)->get();
        return view('config.generalmaster.gender.delete_gender_list', compact('delete_list'));
    }


    public function gender_restore(Request $request)
    {
        // dd($request->all());
        try {
            $gender = Gender::find($request->id);
            $request->action == 'delete' ? $gender->GMGDHMarkForDeletion = 1 : $gender->GMGDHMarkForDeletion = 0;

            $gender->GMGDHDeletedAt = now();
            $gender->save();

            if ($gender) {
                return response()->json(['status' => 'success', 'data' => $gender]);
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

