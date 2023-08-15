<?php

namespace App\Http\Controllers\Config\GeneralMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Config\GeneralMaster\BloodGroup;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;

class BloodGroupController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $bloodGroup_list = BloodGroup::where('GMBGHMarkForDeletion', '!=', 1)->get();
        $bloodGroup_delete_list = BloodGroup::where('GMBGHMarkForDeletion', 1)->get();
        return view('config.generalmaster.bloodgroup.blood', compact('bloodGroup_list', 'bloodGroup_delete_list'));
    }
    public function add(Request $request)
    {
        return view('config.generalmaster.bloodgroup.add_blood');
    }
    public function edit_blood(Request $request)
    {
        $bloodGroup = BloodGroup::where('id', Crypt::decryptString($request->id))->first();
        return view('config.generalmaster.bloodgroup.edit_blood', compact('bloodGroup'));
    }
    public function submit_blood(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'GMBGHBloodGroupId' => 'required|min:2|max:10|unique:t11901l03,GMBGHBloodGroupId,' . $request->id,
                'GMBGHDesc1'      => 'required|max:100',
                'GMBGHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $bloodGroup_data = new BloodGroup();
            if ($request->id != null) {
                //update
                $bloodGroup_data = BloodGroup::find($request->id);
            }

            $bloodGroup_data->GMBGHBloodGroupId = $request->GMBGHBloodGroupId;
            $bloodGroup_data->GMBGHDesc1 = $request->GMBGHDesc1;
            $bloodGroup_data->GMBGHDesc2 = $request->GMBGHDesc2;
            $bloodGroup_data->GMBGHBiDesc = $request->GMBGHBiDesc;
            $bloodGroup_data->GMBGHUser = Auth::user()->name;
            // GMBGHUser=Auth::user()->id;
            $bloodGroup_data->GMBGHLastCreated = now();
            $bloodGroup_data->GMBGHLastUpdated = now();
            $bloodGroup_data->save();


            if ($bloodGroup_data) {
                return response()->json(['status' => 'success', 'data' => $bloodGroup_data, 'updateMode' => 'Updated']);
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


    public function delete_blood_list()
    {
        $delete_list = BloodGroup::where('GMBGHMarkForDeletion', 1)->get();
        return view('config.generalmaster.bloodgroup.delete_blood_list', compact('delete_list'));
    }


    public function blood_restore(Request $request)
    {
        // dd($request->all());
        try {
            $bloodGroup = BloodGroup::find($request->id);
            $request->action == 'delete' ? $bloodGroup->GMBGHMarkForDeletion = 1 : $bloodGroup->GMBGHMarkForDeletion = 0;

            $bloodGroup->GMBGHDeletedAt = now();
            $bloodGroup->save();

            if ($bloodGroup) {
                return response()->json(['status' => 'success', 'data' => $bloodGroup]);
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

    // public function getBloodData($id)
    // {
    //     try {
    //         return BloodGroup::where('id', $id)->first();
    //     } catch (QueryException $e) {
    //         Log::error($e->getMessage());
    //         return response()->json(['status' => 'technical_error']);
    //     } catch (\Exception $e) {
    //         Log::error($e->getMessage());
    //         $this->error_log($e);
    //         return response()->json(['status' => 'technical_error']);
    //     }
    // }
}

