<?php

namespace App\Http\Controllers\Config\Geographic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Config\Geographic\Country;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;


class CountryController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $country_list = Country::where('GMCMHMarkForDeletion', '!=', 1)->get();
        $country_delete_list = Country::where('GMCMHMarkForDeletion', 1)->get();
        return view('config.geographic.country.country', compact('country_list', 'country_delete_list'));
    }
    public function add(Request $request)
    {
        return view('config.geographic.country.add_country');
    }
    public function edit_country(Request $request)
    {
        $country = Country::where('id', Crypt::decryptString($request->id))->first();
        return view('config.geographic.country.edit_country', compact('country'));
    }
    public function submit_country(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'GMCMHCountryId' => 'required|min:2|max:10|unique:t05901l03,GMCMHCountryId,' . $request->id,
                'GMCMHDesc1'      => 'required|max:100',
                'GMCMHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $country_data = new Country();
            if ($request->id != null) {
                //update
                $country_data = Country::find($request->id);
            }

            $country_data->GMCMHCountryId = $request->GMCMHCountryId;
            $country_data->GMCMHDesc1 = $request->GMCMHDesc1;
            $country_data->GMCMHDesc2 = $request->GMCMHDesc2;
            $country_data->GMCMHBiDesc = $request->GMCMHBiDesc;
            $country_data->GMCMHUser = Auth::user()->name;
            // GMCMHUser=Auth::user()->id;
            $country_data->GMCMHLastCreated = now();
            $country_data->GMCMHLastUpdated = now();
            $country_data->save();


            if ($country_data) {
                return response()->json(['status' => 'success', 'data' => $country_data, 'updateMode' => 'Updated']);
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


    public function delete_country_list()
    {
        $delete_list = Country::where('GMCMHMarkForDeletion', 1)->get();
        return view('config.geographic.country.delete_country_list', compact('delete_list'));
    }


    public function country_restore(Request $request)
    {
        // dd($request->all());
        try {
            $country = Country::find($request->id);
            $request->action == 'delete' ? $country->GMCMHMarkForDeletion = 1 : $country->GMCMHMarkForDeletion = 0;

            $country->GMCMHDeletedAt = now();
            $country->save();

            if ($country) {
                return response()->json(['status' => 'success', 'data' => $country]);
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

    public function getCountryData($id)
    {
        try {
            return Country::where('id', $id)->first();
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
