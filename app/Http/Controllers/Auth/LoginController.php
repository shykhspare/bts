<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\OrderItem;
// use App\Models\Orderhd;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function forgotpassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);

        return Response()->json($status);
    }
    public function login2(Request $request)
    {

        $sessionId = session()->getId();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->where('active', 1)->first();
        if (!$user) {
            $response = array("response" => 'fail', 'message' => 'User is temprory block');
            return Response()->json($response);
        }

        if (\Auth::attempt($credentials)) {

            OrderItem::where('user_id', \Auth::User()->id)->delete();
            OrderItem::where('session_id', $sessionId)->where('user_id', 0)->update(['user_id' => \Auth::User()->id]);
            // Orderhd::where('session_id', $sessionId)->where('user_id', 0)->update(['user_id' => \Auth::User()->id]);
            $response = array("response" => 'success', 'message' => 'Successfully Login');
        } else {
            $response = array("response" => 'fail', 'message' => 'Opps! You have entered invalid credentials');
        }
        return Response()->json($response);
    }


    public function Register2(Request $request)
    {

        $sessionId = session()->getId();
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
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
                'gender' => $request['gender'],
                'password' => Hash::make($request['password']),
            ]);
            $credentials = $request->only('email', 'password');
            if (\Auth::attempt($credentials)) {
                OrderItem::where('session_id', $sessionId)->where('user_id', 0)->update(['user_id' => \Auth::User()->id]);
                // Orderhd::where('session_id', $sessionId)->where('user_id', 0)->update(['user_id' => \Auth::User()->id]);
                $response = array("response" => 'success', 'message' => 'Successfully Login', 'error' => null);
            } else {
                $response = array("response" => 'fail', 'message' => 'Oppes! You have entered invalid credentials', 'error' => null);
            }
        }


        return Response()->json($response);
    }

    public function logout(Request $request)
    {
        \Auth::logout();
        return redirect('/');
    }
}
