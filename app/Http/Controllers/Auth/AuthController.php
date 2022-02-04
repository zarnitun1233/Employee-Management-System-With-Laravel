<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
          if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
              $userId = Auth::user()->id;
            if (Auth::user()->role == 1) {
                return redirect('/employee/list');
            }
            else {
                return redirect('/leaves/create/' . $userId);
            }
          }
          else 
          return redirect("/login")->withFail('Oppes! You have entered invalid email or password');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Auth::logout();
        return redirect('/login')->withSuccess('Logout Succeed!');
    }

    
}
