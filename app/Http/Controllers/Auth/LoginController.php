<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\HistoryLogin;
use App\Models\Passwords;
use App\Models\StatusRef;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // Mencari data user berdasarkan username
        $user = $this->findUsername($username);

        // dd($user);
        if (!$user) {
            $statusMessage  = $this->setStatusCode('0302');
            $this->insertHistoryLogin($request, $user, $statusMessage);
            return $this->errorUsernameNotExist();
        }

        // Melakukan komparasi User password dengan request password
        $pass = $this->comparePassword($user, $password);

        if (!$pass) {
            $statusMessage  = $this->setStatusCode('0303');
            $this->insertHistoryLogin($request, $user, $statusMessage);
            return $this->errorPassword();
        }

        // Melakukan set Auth Guard kepada user
        $this->setGuard($user);

        // Melukan insert ke table history login
        $statusMessage  = $this->setStatusCode('0301');
        $this->insertHistoryLogin($request, $user, $statusMessage);

        // Redirect ke route dashboard ketika berhasil authenticated
        return redirect()->route('dashboard');
    }

    protected function findUsername($username)
    {
        $user = User::where('username', $username)->first();
        return $user;
    }

    protected function errorUsernameNotExist()
    {
        return redirect()->back()
            ->withInput()
            ->with(Session::flash('fail', 'Username anda tidak ditemukan'));
    }

    protected function comparePassword($user, $password)
    {
        $userPassword = Passwords::where('user_id', $user->id)
            ->where('status_code', '0201')
            ->first()['password'];

        $pass = Hash::check($password, $userPassword);

        return $pass;
    }

    protected function errorPassword()
    {
        return redirect()->back()
            ->withInput()
            ->with(Session::flash('fail', 'Password anda salah'));
    }

    protected function setGuard($user)
    {
        return Auth::guard()->login($user);
    }

    protected function insertHistoryLogin($request, $user, $message)
    {
        $agent = request()->server('HTTP_USER_AGENT');

        HistoryLogin::create([
            'isrep_id'      => 1,
            'user_id'       => empty($user->id) ? null : $user->id,
            'user_code'     => empty($user->code) ? null : $user->code,
            'user_login'    => empty($user->username) ? null : $user->username,
            'username'      => $message->code == '0302' ? '' : 'SUPER ADMIN',
            'status_id'     => $message->id,
            'status_code'   => $message->code,
            'ip_address'    => $request->ip(),
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude,
            'agent'         => $request->server('HTTP_USER_AGENT'),
        ]);
    }

    protected function setStatusCode($code)
    {
        $status = StatusRef::where('code', $code)->where('type_id','3')->first();

        return $status;
    }
}
