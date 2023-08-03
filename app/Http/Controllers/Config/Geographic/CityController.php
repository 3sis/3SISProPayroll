<?php

namespace App\Http\Controllers\Config\Geographic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Config\Geographic\City;
use App\Models\Config\Geographic\State;
use App\Models\Config\Geographic\Country;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;

// use App\Models\Technical_Error;
use App\Traits\Error;
use DataTables;

class CityController extends Controller
{
    use Error;
    protected  $gCompanyId = '1000';
    public function index(Request $request)
    {
        $city_list = City::where('GMCTHMarkForDeletion', '!=', 1)->with('fnState', 'fnCountry')->get();
        $state_list = State::all();
        return view('config.geographic.city.city', compact('city_list', 'state_list'));
    }
    public function add(Request $request)
    {
        $state_list = State::all();
        return view('config.geographic.city.add_city', compact('state_list'));
    }
    public function edit_city(Request $request)
    {
        $city = City::where('id', Crypt::decryptString($request->id))->with('fnState', 'fnCountry')->first();
        $state_list = State::all();
        return view('config.geographic.city.edit_city', compact('state_list', 'city'));
    }
    public function submit_city(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'GMCTHCityId' => 'required|min:2|max:10|unique:t05901l05,GMCTHCityId,' . $request->id,
                'GMCTHDesc1'      => 'required|max:100',
                'GMCTHDesc2'      => 'max:200',
                'GMCTHStateId'     => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $city_data = new City();
            if ($request->id != null) {
                //update
                $city_data = City::find($request->id);
            }

            $city_data->GMCTHCityId = $request->GMCTHCityId;
            $city_data->GMCTHStateId = $request->GMCTHStateId;
            $city_data->GMCTHCountryId = $request->GMCTHCountryId;
            $city_data->GMCTHDesc1 = $request->GMCTHDesc1;
            $city_data->GMCTHDesc2 = $request->GMCTHDesc2;
            $city_data->GMCTHBiDesc = $request->GMCTHBiDesc;
            $city_data->GMCTHUser = Auth::user()->name;
            // GMCTHUser=Auth::user()->id;
            $city_data->GMCTHLastCreated = now();
            $city_data->GMCTHLastUpdated = now();
            $city_data->save();


            if ($city_data) {
                return response()->json(['status' => 'success', 'data' => $city_data, 'updateMode' => 'Updated']);
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


    public function delete_city_list()
    {
        $delete_list = City::where('GMCTHMarkForDeletion', 1)->with('fnState', 'fnCountry')->get();
        return view('config.geographic.city.delete_city_list', compact('delete_list'));
    }


    public function city_restore(Request $request)
    {
        try {
            $city = City::find($request->id);
            $request->action == 'delete' ? $city->GMCTHMarkForDeletion = 1 : $city->GMCTHMarkForDeletion = 0;

            $city->GMCTHDeletedAt = now();
            $city->save();

            if ($city) {
                return response()->json(['status' => 'success', 'data' => $city]);
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

    public function getStateDesc(Request $request)
    {
        $State_Detail = State::with('fnCountry')->where('GMSMHStateId', $request->id)->first();
        $stateDetail = [];
        // dd($State_Detail);
        // $stateDetail['StateId'] = $State_Detail['GMSMHStateId'];
        // $stateDetail['StateDesc'] = $State_Detail['GMSMHDesc1'];
        $stateDetail['CountryId'] = $State_Detail['fnCountry']['GMCMHCountryId'];
        $stateDetail['CountryDesc'] = $State_Detail['fnCountry']['GMCMHDesc1'];
        return response()->json($stateDetail);
    }
}
