<?php

namespace App\Http\Controllers\LMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\LMS\LeaveGroup;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;
class LeaveGroupController extends Controller
{
    use Error;
    protected  $gCompanyId = '1000';
    public function index(Request $request)
    {
        $leavegroup_list = LeaveGroup::where('LMLGHMarkForDeletion', '!=', 1)->where('t13908l01.LMLGHCompanyId', $this->gCompanyId)->get();
        $leavegroup_delete_list = LeaveGroup::where('LMLGHMarkForDeletion', 1)->where('t13908l01.LMLGHCompanyId', $this->gCompanyId)->get();
        return view('lms.leavegroup', compact('leavegroup_list', 'leavegroup_delete_list'));
    }
    public function add(Request $request)
    {
        return view('lms.add_leavegroup');
    }
    public function edit_leavegroup(Request $request)
    {
        $leaveGroup = LeaveGroup::where('id', Crypt::decryptString($request->id))->first();
        return view('lms.edit_leavegroup', compact('leaveGroup'));
    }
    public function submit_leavegroup(Request $request)
    {
        try {
            $request->merge(['LMLGHCompanyId' => $this->gCompanyId]);

            $validator = Validator::make($request->all(), [
                'LMLGHGroupId' => 'required|min:2|max:10|unique:t13908l01,LMLGHGroupId,' . $request->id,
                'LMLGHDesc1'      => 'required|max:100',
                'LMLGHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $leaveGroup_data = new LeaveGroup();
            if ($request->id != null) {
                //update
                $leaveGroup_data = LeaveGroup::find($request->id);
            }

            $leaveGroup_data->LMLGHCompanyId = $request->LMLGHCompanyId;
            $leaveGroup_data->LMLGHGroupId = $request->LMLGHGroupId;
            $leaveGroup_data->LMLGHDesc1 = $request->LMLGHDesc1;
            $leaveGroup_data->LMLGHDesc2 = $request->LMLGHDesc2;
            $leaveGroup_data->LMLGHBiDesc = $request->LMLGHBiDesc;
            $leaveGroup_data->LMLGHUser = Auth::user()->name;
            // LMLGHUser=Auth::user()->id;
            $leaveGroup_data->LMLGHLastCreated = now();
            $leaveGroup_data->LMLGHLastUpdated = now();
            $leaveGroup_data->save();


            if ($leaveGroup_data) {
                return response()->json(['status' => 'success', 'data' => $leaveGroup_data, 'updateMode' => 'Updated']);
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


    public function delete_leavegroup_list()
    {
        $delete_list = LeaveGroup::where('LMLGHMarkForDeletion', 1)->get();
        return view('lms.delete_leavegroup_list', compact('delete_list'));
    }


    public function leavegroup_restore(Request $request)
    {
        // dd($request->all());
        try {
            $leaveGroup = LeaveGroup::find($request->id);
            $request->action == 'delete' ? $leaveGroup->LMLGHMarkForDeletion = 1 : $leaveGroup->LMLGHMarkForDeletion = 0;

            $leaveGroup->LMLGHDeletedAt = now();
            $leaveGroup->save();

            if ($leaveGroup) {
                return response()->json(['status' => 'success', 'data' => $leaveGroup]);
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

    public function getLeaveGroupData($id)
    {
        try {
            return LeaveGroup::where('id', $id)->first();
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
