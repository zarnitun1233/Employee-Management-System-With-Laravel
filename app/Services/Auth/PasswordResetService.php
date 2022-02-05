<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use App\Contracts\Services\Auth\PasswordResetServiceInterface;
use App\Contracts\Dao\Auth\PasswordResetDaoInterface;
use App\Mail\Auth\PasswordResetMail;
use Mail;
use URL;

class PasswordResetService implements PasswordResetServiceInterface
{
  /**
   * passwordReset Dao
   */
  private $passwordResetDao;

  /**
     * Class Constructor
     * @param passwordResetDaoInterface
     */
  public function __construct(PasswordResetDaoInterface $passwordResetDao)
  {
    $this->passwordResetDao = $passwordResetDao;
  }

  /**
   * Send Mail Function
   * @param String $email
   */
  public function postMail(string $email)
  {
    $token = $this->passwordResetDao->postMail($email);
    return Mail::to($email)->send(new PasswordResetMail([
          'email' => $email,
          'token' => $token,
          'url'   => URL::to('/'),
        ]));
  }
  
  /**
   * Change Password Function
   * @param Request $request
   */
  public function postChangePassword(Request $request)
  {
    return $this->passwordResetDao->postChangePassword($request); 
  }
}
