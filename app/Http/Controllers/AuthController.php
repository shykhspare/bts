<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
// use App\Models\OrderItem;
// use App\Models\Orderhd;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Login()
    {

        return view('auth.login');
    }


    public function signup()
    {

        if (\Auth::check()) {
            return Redirect('dashboard');
        }
        return view('auth.register');
    }
    public function login2(Request $request)
    {

        $sessionId = session()->getId();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (\Auth::attempt($credentials)) {
            // OrderItem::where('session_id', $sessionId)->where('user_id', 0)->update(['user_id' => \Auth::User()->id]);
            // Orderhd::where('session_id', $sessionId)->where('user_id', 0)->update(['user_id' => \Auth::User()->id]);
            $response = array("response" => 'success', 'message' => 'Successfully Login');
        } else {
            $response = array("response" => 'fail', 'message' => 'Oppes! You have entered invalid credentials');
        }
        return Response()->json($response);
    }


    public function Register2(Request $request)
    {

        $sessionId = session()->getId();
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            $response = array("response" => 'fail', 'message' => 'Oppes! Cannot Create Your Account Please Try Again', 'error' => $validator->errors());
        } else {
            $user =  User::create([
                'name' =>  $request['name'],
                'email' =>  $request['email'],
                'phone' => $request['phone'],
                'type' => 3,
                'password' => Hash::make($request['password']),
            ]);
            $credentials = $request->only('email', 'password');
            if (\Auth::attempt($credentials)) {
                // OrderItem::where('session_id', $sessionId)->where('user_id', 0)->update(['user_id' => \Auth::User()->id]);
                // Orderhd::where('session_id', $sessionId)->where('user_id', 0)->update(['user_id' => \Auth::User()->id]);
                $response = array("response" => 'success', 'message' => 'Successfully Login', 'error' => null);
            } else {
                $response = array("response" => 'fail', 'message' => 'Oppes! You have entered invalid credentials', 'error' => null);
            }
        }


        return Response()->json($response);
    }
}
