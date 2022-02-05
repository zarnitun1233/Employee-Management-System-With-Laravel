<?php

namespace App\Dao\Auth;

use Illuminate\Http\Request;
use App\Contracts\Dao\Auth\PasswordResetDaoInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class PasswordResetDao implements   PasswordResetDaoInterface
{
  /**
   * Send Mail Function
   * @param String $email
   */
  public function postMail(string $email)
  {
    $token = Str::random(60);
    DB::transaction(function ($email, $token) {
      DB::table('password_resets')
      ->insert([
        'email' => $email,
        'token' => $token,
        'created_at' => Carbon::now(),
        'expired_time' => Carbon::now()->addMinutes(10),
      ]);
    });

    return $token;

  }

  /**
   * Change Password Function
   * @param Request $request
   */
  public function postChangePassword(Request $request)
  { 
    $check = DB::table('password_resets')
      ->where('token','=',$request->token)
      ->where('expired_time','>',Carbon::now())
      ->first();

    if(!$check){
      return false;
    }
    
    $employee = Employee::where('email', $check->email)
    ->update(['password' => Hash::make($request->password)]);

    return DB::transaction(function ($check) {
      DB::table('password_resets')->where(['email'=> $check->email])->delete();
  });
  ;

  }
}
