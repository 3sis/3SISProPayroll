<?php

namespace App\Http\Controllers\Config\GeneralMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Config\GeneralMaster\RaceGroup;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;

class RaceController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $raceGroup_list = RaceGroup::where('GMRAHMarkForDeletion', '!=', 1)->get();
        $raceGroup_delete_list = RaceGroup::where('GMRAHMarkForDeletion', 1)->get();
        return view('config.generalmaster.raceGroup.race', compact('raceGroup_list', 'raceGroup_delete_list'));
    }
    public function add(Request $request)
    {
        return view('config.generalmaster.raceGroup.add_race');
    }
    public function edit_race(Request $request)
    {
        $raceGroup = RaceGroup::where('id', Crypt::decryptString($request->id))->first();
        return view('config.generalmaster.raceGroup.edit_race', compact('raceGroup'));
    }
    public function submit_race(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'GMRAHRaceId' => 'required|min:2|max:10|unique:t11901l05,GMRAHRaceId,' . $request->id,
                'GMRAHDesc1'      => 'required|max:100',
                'GMRAHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $raceGroup_data = new RaceGroup();
            if ($request->id != null) {
                //update
                $raceGroup_data = RaceGroup::find($request->id);
            }

            $raceGroup_data->GMRAHRaceId = $request->GMRAHRaceId;
            $raceGroup_data->GMRAHDesc1 = $request->GMRAHDesc1;
            $raceGroup_data->GMRAHDesc2 = $request->GMRAHDesc2;
            $raceGroup_data->GMRAHBiDesc = $request->GMRAHBiDesc;
            $raceGroup_data->GMRAHUser = Auth::user()->name;
            // GMRAHUser=Auth::user()->id;
            $raceGroup_data->GMRAHLastCreated = now();
            $raceGroup_data->GMRAHLastUpdated = now();
            $raceGroup_data->save();


            if ($raceGroup_data) {
                return response()->json(['status' => 'success', 'data' => $raceGroup_data, 'updateMode' => 'Updated']);
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


    public function delete_race_list()
    {
        $delete_list = RaceGroup::where('GMRAHMarkForDeletion', 1)->get();
        return view('config.generalmaster.raceGroup.delete_race_list', compact('delete_list'));
    }


    public function race_restore(Request $request)
    {
        // dd($request->all());
        try {
            $raceGroup = RaceGroup::find($request->id);
            $request->action == 'delete' ? $raceGroup->GMRAHMarkForDeletion = 1 : $raceGroup->GMRAHMarkForDeletion = 0;

            $raceGroup->GMRAHDeletedAt = now();
            $raceGroup->save();

            if ($raceGroup) {
                return response()->json(['status' => 'success', 'data' => $raceGroup]);
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
