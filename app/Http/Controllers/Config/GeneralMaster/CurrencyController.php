<?php

namespace App\Http\Controllers\Config\GeneralMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\t92;
use App\Models\Config\GeneralMaster\Currency;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use App\Traits\Error;
use DataTables;

class CurrencyController extends Controller
{
    use Error;
    public function index(Request $request)
    {
        $currency_list = Currency::where('GMCRHMarkForDeletion', '!=', 1)->get();
        $currency_delete_list = Currency::where('GMCRHMarkForDeletion', 1)->get();
        return view('config.generalmaster.currency.currency', compact('currency_list', 'currency_delete_list'));
    }
    public function add(Request $request)
    {
        return view('config.generalmaster.currency.add_currency');
    }
    public function edit_currency(Request $request)
    {
        $currency = Currency::where('id', Crypt::decryptString($request->id))->first();
        return view('config.generalmaster.currency.edit_currency', compact('currency'));
    }
    public function submit_currency(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'GMCRHCurrencyId' => 'required|min:2|max:10|unique:t05901l07,GMCRHCurrencyId,' . $request->id,
                'GMCRHDesc1'      => 'required|max:100',
                'GMCRHDesc2'      => 'max:200',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
            $currency_data = new Currency();
            if ($request->id != null) {
                //update
                $currency_data = Currency::find($request->id);
            }

            $currency_data->GMCRHCurrencyId = $request->GMCRHCurrencyId;
            $currency_data->GMCRHDesc1 = $request->GMCRHDesc1;
            $currency_data->GMCRHDesc2 = $request->GMCRHDesc2;
            $currency_data->GMCRHBiDesc = $request->GMCRHBiDesc;
            $currency_data->GMCRHUser = Auth::user()->name;
            // GMCRHUser=Auth::user()->id;
            $currency_data->GMCRHLastCreated = now();
            $currency_data->GMCRHLastUpdated = now();
            $currency_data->save();


            if ($currency_data) {
                return response()->json(['status' => 'success', 'data' => $currency_data, 'updateMode' => 'Updated']);
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


    public function delete_currency_list()
    {
        $delete_list = Currency::where('GMCRHMarkForDeletion', 1)->get();
        return view('config.generalmaster.currency.delete_currency_list', compact('delete_list'));
    }


    public function currency_restore(Request $request)
    {
        // dd($request->all());
        try {
            $currency = Currency::find($request->id);
            $request->action == 'delete' ? $currency->GMCRHMarkForDeletion = 1 : $currency->GMCRHMarkForDeletion = 0;

            $currency->GMCRHDeletedAt = now();
            $currency->save();

            if ($currency) {
                return response()->json(['status' => 'success', 'data' => $currency]);
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

