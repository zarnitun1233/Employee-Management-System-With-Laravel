<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

interface  PasswordResetDaoInterface
{

  public function postMail(string $email);

  public function postChangePassword(Request $request);
}