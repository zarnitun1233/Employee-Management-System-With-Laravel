<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('frontend.auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
//        $credentials = $request->only('email', 'password');
//        if (Auth::attempt($credentials)) {
//            return redirect()->intended('dashboard')
//                        ->withSuccess('You have Successfully loggedin');
//        }
//  
//        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
          if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return "true";
          }
          else 
          return "false";
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Auth::logout();
        return Redirect('login');
    }
}
