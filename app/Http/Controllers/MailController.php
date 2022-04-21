<?php

namespace App\Http\Controllers;

use App\Http\Requests\HandleForgotPasswordRequest;
use App\Http\Requests\SendTokenForgotPasswordRequest;
use App\Services\MailService;
use App\Services\UserService;

class MailController extends Controller
{
    protected $mail;

    /**
     *  initialization function
     */
    public function __construct()
    {
        $this->mail = new MailService();
    }

    /**
     * Process data from user email for email authentication
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verification()
    {
        $token = request()->token;

        $email = request()->email;

        $get_token_email = $this->mail->getTokenEmail($email);

        $token_email =  $get_token_email[0]->token_email;

        $smg = __('message.verification.fail');

        if ($token_email == $token) {
            $this->mail->setVerticalEmail($email);
            $smg =  __('message.verification.success');
        }
        return redirect()->route('home')->with('smg', $smg);
    }

    /**
     *Send email token to user via registered email
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendTokenForgotPassword(SendTokenForgotPasswordRequest $request)
    {
        $request->validated();

        $email =  $request->email;

        $this->mail->setTokenForgotPassword($email,  csrf_token());

        $this->mail->sendMailForgot($email,  csrf_token());

        return back()->with('smg', __('message.email.sendToken', ['emai' => $email]));
    }

    /**
     *Process data from user email for email forgot password
     *
     * @param \App\Services\MailService $mailService
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
     */
    public function forgotPassword(MailService $mailService)
    {
        $get_token_forgot = $mailService->getTokenForgotPassword(request()->email);

        $token_forgot =   $get_token_forgot[0]->token_forgot_password;

        if (request()->token ==  $token_forgot) return view('auth.ForgotPassword');
        return back()->with('smg', __('message.user.no'));
    }

    /**
     * Process data from forgotten password form to renew user's password
     *
     * @param \App\Http\Requests\HandleForgotPasswordRequest $handleForgotPasswordRequest
     * @param \App\Services\UserService $userService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleforgotPassword(HandleForgotPasswordRequest $handleForgotPasswordRequest, UserService $userService)
    {
        $handleForgotPasswordRequest->validated();

        $userService->updatePasswordUser($handleForgotPasswordRequest->email, $handleForgotPasswordRequest->password);

        return redirect()->route('home')->with('smg', __('message.password.change.success'));
    }
}