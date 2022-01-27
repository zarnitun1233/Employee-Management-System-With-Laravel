<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

interface PasswordResetServiceInterface
{
  public function postMail(string $email);

  public function changePassword(Request $request);

  public function postChangePassword(Request $request);
}