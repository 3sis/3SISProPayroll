<?php

namespace App\Http\Controllers\Config\GeneralMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Config\GeneralMaster\Salutation;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;

class SalutationController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $salutation_list = Salutation::where('GMSLHMarkForDeletion', '!=', 1)->get();
        $salutation_delete_list = Salutation::where('GMSLHMarkForDeletion', 1)->get();
        return view('config.generalmaster.salutation.salutation', compact('salutation_list', 'salutation_delete_list'));
    }
    public function add(Request $request)
    {
        return view('config.generalmaster.salutation.add_salutation');
    }
    public function edit_salutation(Request $request)
    {
        $salutation = Salutation::where('id', Crypt::decryptString($request->id))->first();
        return view('config.generalmaster.salutation.edit_salutation', compact('salutation'));
    }
    public function submit_salutation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'GMSLHSalutationId' => 'required|min:2|max:10|unique:t11901l01,GMSLHSalutationId,' . $request->id,
                'GMSLHDesc1'      => 'required|max:100',
                'GMSLHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $salutation_data = new Salutation();
            if ($request->id != null) {
                //update
                $salutation_data = Salutation::find($request->id);
            }

            $salutation_data->GMSLHSalutationId = $request->GMSLHSalutationId;
            $salutation_data->GMSLHDesc1 = $request->GMSLHDesc1;
            $salutation_data->GMSLHDesc2 = $request->GMSLHDesc2;
            $salutation_data->GMSLHBiDesc = $request->GMSLHBiDesc;
            $salutation_data->GMSLHUser = Auth::user()->name;
            // GMSLHUser=Auth::user()->id;
            $salutation_data->GMSLHLastCreated = now();
            $salutation_data->GMSLHLastUpdated = now();
            $salutation_data->save();


            if ($salutation_data) {
                return response()->json(['status' => 'success', 'data' => $salutation_data, 'updateMode' => 'Updated']);
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


    public function delete_salutation_list()
    {
        $delete_list = Salutation::where('GMSLHMarkForDeletion', 1)->get();
        return view('config.generalmaster.salutation.delete_salutation_list', compact('delete_list'));
    }


    public function salutation_restore(Request $request)
    {
        // dd($request->all());
        try {
            $salutation = Salutation::find($request->id);
            $request->action == 'delete' ? $salutation->GMSLHMarkForDeletion = 1 : $salutation->GMSLHMarkForDeletion = 0;

            $salutation->GMSLHDeletedAt = now();
            $salutation->save();

            if ($salutation) {
                return response()->json(['status' => 'success', 'data' => $salutation]);
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

