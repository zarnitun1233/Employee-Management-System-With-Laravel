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
  public function postMail(string $email)
  {
    $token = Str::random(60);
    DB::table('password_resets')
    ->insert([
      'email' => $email,
      'token' => $token,
      'created_at' => Carbon::now(),
      'expired_time' => Carbon::now()->addMinutes(10),
    ]);

    return $token;

  }

  public function changePassword(Request $request)
  {
    $check = DB::table('employees')
    ->where([
      'email' => $request->email, 
    ])
    ->first();
    if(!$check){
      return false;
    }

    return true;
  }

  public function postChangePassword(Request $request)
  { 
    $check = DB::table('password_resets')
    ->where('email','=',$request->email)->where('created_at','<',Carbon::now())
    ->first();
    if(!$check){
      return false;
    }
    
    $employee = Employee::where('email', $request->email)
    ->update(['password' => Hash::make($request->password)]);

    return DB::table('password_resets')->where(['email'=> $request->email])->delete();

  }
}
