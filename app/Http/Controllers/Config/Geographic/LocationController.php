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
use App\Models\Config\Geographic\Location;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;

// use App\Models\Technical_Error;
use App\Traits\Error;
use DataTables;

class LocationController extends Controller
{
    use Error;
    protected  $gCompanyId = '1000';
    public function index(Request $request)
    {
        $location_list = Location::where('GMLMHMarkForDeletion', '!=', 1)->where('t05901l06.GMLMHCompanyId', $this->gCompanyId)->with('fnCity', 'fnState', 'fnCountry')->get();
        $city_list = City::all();
        return view('config.Geographic.location', compact('city_list', 'location_list'));
    }
    public function add(Request $request)
    {
        $city_list = City::all();
        return view('config.Geographic.add_location', compact('city_list'));
    }
    public function edit_location(Request $request)
    {
        $location = Location::where('id', Crypt::decryptString($request->id))->with('fnCity', 'fnState', 'fnCountry')->first();
        $city_list = City::all();
        return view('config.Geographic.edit_location', compact('city_list', 'location'));
    }
    public function submit_location(Request $request)
    {
        try {
            $request->merge(['GMLMHCompanyId' => $this->gCompanyId]);

            $validator = Validator::make($request->all(), [
                'GMLMHLocationId' => 'required|min:2|max:10|unique:t05901l06,GMLMHLocationId,' . $request->id,
                'GMLMHDesc1'      => 'required|max:100',
                'GMLMHDesc2'      => 'max:200',
                'GMLMHCityId'     => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $location_data = new Location();
            if ($request->id != null) {
                //update
                $location_data = Location::find($request->id);
            }

            $location_data->GMLMHCompanyId = $request->GMLMHCompanyId;
            $location_data->GMLMHLocationId = $request->GMLMHLocationId;
            $location_data->GMLMHCityId = $request->GMLMHCityId;
            $location_data->GMLMHStateId = $request->GMLMHStateId;
            $location_data->GMLMHCountryId = $request->GMLMHCountryId;
            $location_data->GMLMHDesc1 = $request->GMLMHDesc1;
            $location_data->GMLMHDesc2 = $request->GMLMHDesc2;
            $location_data->GMLMHBiDesc = $request->GMLMHBiDesc;
            $location_data->GMLMHUser = Auth::user()->name;
            // GMLMHUser=Auth::user()->id;
            $location_data->GMLMHLastCreated = now();
            $location_data->GMLMHLastUpdated = now();
            $location_data->save();


            if ($location_data) {
                return response()->json(['status' => 'success', 'data' => $location_data, 'updateMode' => 'Updated']);
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


    public function delete_location_list()
    {
        $delete_list = Location::where('GMLMHMarkForDeletion', 1)->with('fnCity', 'fnState', 'fnCountry')->get();
        return $this->TableActionRestoreTrait($delete_list);
    }


    public function delete_restore(Request $request)
    {
        try {
            $location = Location::find($request->id);
            $request->action == 'delete' ? $location->GMLMHMarkForDeletion = 1 : $location->GMLMHMarkForDeletion = 0;
            $location->save();
            if ($location) {
                return response()->json(['status' => 'success', 'data' => $location]);
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

    public function getLocationData($id)
    {
        try {
            return Location::where('id', $id)->with('fnCity', 'fnState', 'fnCountry')->first();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'technical_error']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->error_log($e);
            return response()->json(['status' => 'technical_error']);
        }
    }
    public function getCityDesc(Request $request)
    {
        $City_Detail = City::with('fnState', 'fnCountry')->where('GMCTHCityId', $request->id)->first();
        $CityDetail = [];
        $CityDetail['StateId'] = $City_Detail['fnState']['GMSMHStateId'];
        $CityDetail['StateDesc'] = $City_Detail['fnState']['GMSMHDesc1'];
        $CityDetail['CountryId'] = $City_Detail['fnCountry']['GMCMHCountryId'];
        $CityDetail['CountryDesc'] = $City_Detail['fnCountry']['GMCMHDesc1'];
        return response()->json($CityDetail);
    }
    // public function fetchData(Request $request)
    // {
    //     try {
    //         $fetchData = Location::where('id', $request->id)->with('fnCity', 'fnState', 'fnCountry')->first();
    //         if ($fetchData) {
    //             return response()->json(['status' => 'success', 'data' => $fetchData]);
    //         } else {
    //             return response()->json(['status' => 'error']);
    //         }
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
