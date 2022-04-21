<?php

namespace App\Services;

use App\Model\Comment;
use Illuminate\Support\Facades\Auth;

class CommentService
{

    /**
     * Add user comments to respective movies
     *
     * @param mixed $data
     * @return bool
     */
    public function addComment($data)
    {
        $arr = [
            Auth::user()->id,
            $data['id'],
            $data['comment'],
            now()
        ];

        return Comment::insert([
            'user_id' => $arr[0],
            'movie_id' => $arr[1],
            'comment' => $arr[2],
            'created_at' => $arr[3],
        ]);
    }

    /**
     * Get user comments to respective movies to id
     *
     * @param mixed $id
     * @return bool
     */
    public function getComment($id)
    {
        return Comment::where('movie_id', $id)
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('movies', 'movies.id', '=', 'comments.movie_id')
            ->orderBy('comments.created_at', 'desc')
            ->limit(10)
            ->get(['users.fullname', 'comments.*']);
    }

    /**
     * Get user from comment via movie id
     *
     * @param mixed $id
     * @return bool
     */
    public function getUser($id)
    {
        return Comment::where('movie_id', $id)
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->limit(10)
            ->groupBy('fullname')
            ->get('users.fullname');
    }
}