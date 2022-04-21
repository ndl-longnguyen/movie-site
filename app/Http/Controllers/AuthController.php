<?php

namespace App\Http\Controllers;

use App\Http\Requests\HandleLoginRequest;
use App\Http\Requests\PostRequest;
use App\Services\MailService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $mail;

    private $users;

    /**
     * initialization function
     */
    public function __construct()
    {
        $this->mail =  new MailService();
        $this->users = new UserService();
    }

    /**
     * Logout the user from the session
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    /**
     * Process data from login form
     *
     * @param \App\Http\Requests\HandleLoginRequest $handleLoginRequest
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function handleLogin(HandleLoginRequest $handleLoginRequest)
    {
        $handleLoginRequest->validated();

        $credentials = $handleLoginRequest->only('email', 'password');

        if (Auth::attempt($credentials, $handleLoginRequest->remember)) {
            return redirect('/')->with('smg', __('message.login.success'));
        }
        return back()->with('smg', __('message.login.fail'));
    }


    /**
     * Process data from register form
     *
     * @param \App\Http\Requests\PostRequest $postRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleRegister(PostRequest $postRequest)
    {
        $postRequest->validated();

        $attrs = $postRequest;

        $insertUser = $this->users->insertUser($attrs);

        $this->mail->sendMailConfirm($postRequest->email, csrf_token());

        if ($insertUser) {
            Auth::attempt($postRequest->only('email', 'password'));
            return redirect('/')->with('smg', __('message.register.success'));
        }
        return back()->with('smg', __('message.register.fail'));
    }
}