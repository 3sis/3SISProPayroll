<?php

namespace App\Http\Controllers\Config\Geographic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Config\Geographic\State;
use App\Models\Config\Geographic\Country;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;

class StateController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $state_list = State::where('GMSMHMarkForDeletion', '!=', 1)->with('fnCountry')->get();
        $state_delete_list = State::where('GMSMHMarkForDeletion', 1)->with('fnCountry')->get();
        $country_list = Country::all();
        return view('config.geographic.state.state', compact('country_list', 'state_list', 'state_delete_list'));
    }
    public function add(Request $request)
    {
        $country_list = Country::all();
        return view('config.geographic.state.add_state', compact('country_list'));
    }
    public function edit_state(Request $request)
    {
        $state = State::where('id', Crypt::decryptString($request->id))->with('fnCountry')->first();
        $country_list = Country::all();
        return view('config.geographic.state.edit_state', compact('country_list', 'state'));
    }
    public function submit_state(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'GMSMHStateId' => 'required|min:2|max:10|unique:t05901l04,GMSMHStateId,' . $request->id,
                'GMSMHDesc1'      => 'required|max:100',
                'GMSMHDesc2'      => 'max:200',
                'GMSMHCountryId'  => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $state_data = new State();
            if ($request->id != null) {
                //update
                $state_data = State::find($request->id);
            }

            $state_data->GMSMHStateId = $request->GMSMHStateId;
            $state_data->GMSMHCountryId = $request->GMSMHCountryId;
            $state_data->GMSMHDesc1 = $request->GMSMHDesc1;
            $state_data->GMSMHDesc2 = $request->GMSMHDesc2;
            $state_data->GMSMHBiDesc = $request->GMSMHBiDesc;
            $state_data->GMSMHUser = Auth::user()->name;
            // GMSMHUser=Auth::user()->id;
            $state_data->GMSMHLastCreated = now();
            $state_data->GMSMHLastUpdated = now();
            $state_data->save();


            if ($state_data) {
                return response()->json(['status' => 'success', 'data' => $state_data, 'updateMode' => 'Updated']);
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


    public function delete_state_list()
    {
        $delete_list = State::where('GMSMHMarkForDeletion', 1)->with('fnCountry')->get();
        return view('config.geographic.state.delete_state_list', compact('delete_list'));
    }


    public function state_restore(Request $request)
    {
        // dd($request->all());
        try {
            $state = State::find($request->id);
            $request->action == 'delete' ? $state->GMSMHMarkForDeletion = 1 : $state->GMSMHMarkForDeletion = 0;

            $state->GMSMHDeletedAt = now();
            $state->save();

            if ($state) {
                return response()->json(['status' => 'success', 'data' => $state]);
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

    public function getStateData($id)
    {
        try {
            return State::where('id', $id)->with('fnCountry')->first();
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
