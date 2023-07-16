<?php

namespace App\Http\Controllers;

use App\Models\t92;
use App\Models\User;
use App\Traits\Error;
use Illuminate\Http\Request;
use App\Models\ApplicationMaster;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\AppAuthorizationHeader;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use Error;
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        try {
            // validate data
            $validator = Validator::make($request->all(), [
                'email'    => 'required|email',
                'password'      => 'required'
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            // login code
            if (Auth::attempt($request->only('email', 'password'))) {
                $LandingPage_App_id = 11;
                $fetchData = AppAuthorizationHeader::where('user_id', Auth::id())
                    ->where('AAAHHAppId', $LandingPage_App_id)->count();
                $app_data = ApplicationMaster::where('AMAMHAppId', $LandingPage_App_id)->first();

                if ($fetchData) {
                    return redirect('home');
                } else {
                    return back()->withError('Your not authorized to ' . $app_data->AMAMHDesc1);
                }
            }
            return back()->withError('Login details are not valid');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'technical_error']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->error_log($e);
            return response()->json(['status' => 'technical_error']);
        }
    }
    // public function register_view()
    // {
    //     return view('auth.register');
    // }
    public function register(Request $request)
    {
        // validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        // save in users table

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password)
        ]);

        // login user here

        if (\Auth::attempt($request->only('email', 'password'))) {
            dd('err');
            // return redirect('home');
        }

        return redirect('register')->withError('Error');
    }
    public function home()
    {
        return view('index');
    }

    public function fastpath(Request $request)
    {
        $fastpath = t92::where('MNFastPath', $request->search)->first();
        if ($fastpath) {
            return response(['status' => 'success', 'redirect_url' => $fastpath['MNRoute']]);
        } else {
            return response(['status' => 'error']);
        }
    }
    public function logout()
    {
        \Session::flush();
        Auth::logout();
        return redirect('/')->withError('You have been successfully logged out!');
    }
}
