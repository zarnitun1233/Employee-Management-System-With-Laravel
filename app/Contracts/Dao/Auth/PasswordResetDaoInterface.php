<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

interface  PasswordResetDaoInterface
{
  /**
   * Send Mail Function
   * @param String $email
   */
  public function postMail(string $email);

  /**
   * Change Password Function
   * @param Request $request
   */
  public function postChangePassword(Request $request);
}