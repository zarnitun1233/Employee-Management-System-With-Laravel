<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

interface PasswordResetServiceInterface
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