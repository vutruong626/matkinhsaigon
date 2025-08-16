<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    // Handle account login request
    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if ($user = User::where('username',$credentials['username'])->orWhere('email', $credentials['username'])->first()) {

            if (Hash::check($credentials['password'],$user->password)) {
                $user = Auth::getProvider()->retrieveByCredentials($credentials);
                Auth::login($user);
                return $this->authenticated($request, $user);
            }

        }

        return redirect()->to('login')->withErrors(trans('auth.failed'));
    }
    
    // Handle response after user authenticated
    protected function authenticated(Request $request, $user) 
    {
        return redirect('dashboard');
        // return redirect()->intended();
    }

    public function getLogout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
