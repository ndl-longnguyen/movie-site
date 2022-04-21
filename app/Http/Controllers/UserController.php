<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $users;

    /**
     * initialization function
     */
    public function __construct()
    {
        $this->users = new UserService();
    }

    /**
     * Display the list of users in page admin dashboard
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $users = $this->users->getAllUsers(8);
        return view('admins.users.dashboard-user', ['users' => $users]);
    }

    /**
     * Add new users to the table users
     *
     * @param \App\Http\Requests\PostRequest $postRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addUser(PostRequest $postRequest)
    {
        $postRequest->validated();

        $data = $postRequest;

        $insertUser = $this->users->insertUser($data);
        $insertUser ? $smg = __('message.add.success', ['obj' => 'user']) : $smg = __('message.add.fail', ['obj' => 'user']);
        return redirect()->route('admin.index')->with('smg', $smg);
    }

    /**
     * Show form update user
     *
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
     */
    public function showUpdateUser($id = 0)
    {
        $user = $this->users->getDetailUser($id);
        if (!empty($user[0])) {
            $user = $user[0];
            session()->put('id', $id);
        } else {
            return back()->with('smg', __('message.user.no'));
        }
        return view('admins.users.update-user', compact('user'));
    }

    /**
     * Update users to the table users with id
     *
     * @param \Illuminate\Http\UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(UpdateUserRequest $updateUserRequest)
    {
        $id = session('id');

        $updateUserRequest->validated();

        if ($updateUserRequest->newpassword == "") {
            $user = $this->users->getDetailUser($id);
            $newpassword = $user[0]->password;
        } else {
            $newpassword = Hash::make($updateUserRequest->newpassword);
        }

        $data = $updateUserRequest;

        $updatetUser = $this->users->updateUser($data, $id, $newpassword);
        ($updatetUser) ? $smg =  __('message.update.success', ['obj' => 'user']) : $smg = __('message.update.fail', ['obj' => 'user']);
        return back()->with('smg', $smg);
    }

    /**
     * Delete user with id from users table
     *
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($id)
    {
        $user = $this->users->getDetailUser($id);
        if ($user[0]->is_admin == 1) {
            $smg = __('message.permission.no');
        } else {
            $delete = $this->users->deleteUser($id);
            $delete ? $smg =  __('message.delete.success', ['obj' => 'user']) : $smg = __('message.delete.fail', ['obj' => 'user']);
        }
        return back()->with('smg', $smg);
    }
}