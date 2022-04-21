<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Get list user from users table
     *
     *  @param mixed $paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator listUser
     */
    public function getAllUsers($paginate)
    {
        return User::paginate($paginate);
    }

    /**
     * Get user detail from users table to id
     *
     *  @param mixed $id
     * @return \Illuminate\Support\Collection userDetail
     */
    public function getDetailUser($id)
    {
        return User::where('id', $id)
            ->get();
    }

    /**
     * Add a new user to the users table with data from form data
     *
     *  @param mixed $data
     * @return int
     */
    public function insertUser($data)
    {
        $arr = [
            $data['fullname'],
            $data['email'],
            Hash::make($data['password']),
            ($data['role']) ?? 0,
            csrf_token(),
            now(),
        ];

        return User::insertGetId([
            'fullname' => $arr[0],
            'email' => $arr[1],
            'password' => $arr[2],
            'is_admin' => $arr[3],
            'token_email' => $arr[4],
            'created_at' => $arr[5]
        ]);
    }

    /**
     * Update a new password user to the users table with email
     *
     *  @param mixed $email
     *  @param mixed $new_password
     * @return int
     */
    public function updatePasswordUser($email, $new_password)
    {
        return User::where('email', $email)
            ->update([
                'password' => Hash::make($new_password),
            ]);
    }

    /**
     * Update user with id to users table
     *
     * @param mixed $data
     * @param mixed $id
     * @param mixed $newpassword
     * @return int
     */
    public function updateUser($data, $id, $newpassword)
    {
        $arr = [
            $data['fullname'],
            $data['email'],
            $newpassword,
            $data['role'] ?? 0,
            now(),
        ];

        return User::where('id', $id)
            ->update([
                'fullname' => $arr[0],
                'email' => $arr[1],
                'password' => $arr[2],
                'is_admin' => $arr[3],
                'updated_at' => $arr[4],
            ]);
    }

    /**
     * Delete user with id to users table
     *
     *  @param mixed $id
     * @return int
     */
    public function deleteUser($id)
    {
        return User::where('id', $id)->delete();
    }
}