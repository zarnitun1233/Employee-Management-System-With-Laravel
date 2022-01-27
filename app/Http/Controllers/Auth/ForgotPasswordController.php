<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Contracts\Services\Auth\PasswordResetServiceInterface;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\StoreResetRequest;
use App\Http\Requests\Auth\PostChangePasswordRequest;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    private $passwordResetService;

    public function __construct(PasswordResetServiceInterface $passwordResetService)
    {
        $this->passwordResetService = $passwordResetService;
    }

    public function index()
    {
        return view('frontend.Auth.reset-mail-send');
    }

    public function postMail(StoreResetRequest $request)
    {
        $this->passwordResetService->postMail($request->email);
    }

    public function changePassword(Request $request)
    {         
       $result = $this->passwordResetService->changePassword($request);
       if(!$result){
        return redirect()->route('reset.password')->with('message','Invaild email');
       }
        return view('.frontend.auth.change-password-form');
    }

    public function postChangePassword(PostChangePasswordRequest $request)
    {   
       $result =  $this->passwordResetService->postChangePassword($request);

       if(!$result)
       {    
           return redirect()->route('reset.password')->with('message','Invaild token or email');
       }

       echo "success";
    }
    // use SendsPasswordResetEmails;
}
