@php
    $url = $mailDatas['url'];
    $email = $mailDatas['email'];
    $token = $mailDatas['token'];
@endphp
@component('mail::message')

Your Password Rest link is ready.

@component('mail::button', ['url' => $url."/auth/change-password/token=$token" ])
Reset Password
@endcomponent

Thanks,<br>
  Admin
@endcomponent