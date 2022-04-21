<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Mail;

class MailService
{
    /**
     * Send email with token verification email  link to user
     *
     * @param mixed $title
     * @param mixed $email
     * @param mixed $token_mail
     * @return void
     */
    public function sendMailConfirm($email, $token_mail)
    {
        $details = [
            'title' => 'Verification email',
            'body' => 'Here is the verification email  sent from the #1 movie site',
            'token' => $token_mail,
            'email' => $email,
        ];

        Mail::to($email)->send(new \App\Mail\SendMail($details));
    }

    /**
     * Send email with token forgot password link to user
     *
     * @param mixed $title
     * @param mixed $email
     * @param mixed $token_mail
     * @return void
     */
    public function sendMailForgot($email, $token_forgot)
    {
        $details = [
            'title' => 'Forgot password',
            'body' => 'Here is the forgot password sent from the #1 movie site',
            'token' => $token_forgot,
            'email' => $email,
        ];

        Mail::to($email)->send(new \App\Mail\SendForgotPassword($details));
    }

    /**
     * Get email token in user instance via user email
     *
     *  @param mixed $email
     * @return \Illuminate\Support\Collection tokenEmail
     */
    public function getTokenEmail($email)
    {
        return User::where('email', $email)
            ->get('token_email');
    }

    /**
     * Get forgot password token in user instance via user email
     *
     * @param mixed $email
     * @return \Illuminate\Support\Collection tokenForgotPassword
     */
    public function getTokenForgotPassword($email)
    {
        return User::where('email', $email)
            ->get('token_forgot_password');
    }

    /**
     * set forgot password token in user instance via user email
     *
     * @param mixed $email
     * @param mixed $token
     * @return int
     */
    public function setTokenForgotPassword($email, $token)
    {
        return User::where('email', $email)
            ->update(['token_forgot_password' => $token]);
    }

    /**
     * Set for user when email confirmation
     *
     *  @param mixed $data
     * @return bool
     */
    public function setVerticalEmail($email)
    {
        return User::where('email', $email)
            ->update(['email_verified_at' => date('Y-m-d H:i:s')]);
    }
}