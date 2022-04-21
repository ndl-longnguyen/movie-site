<?php

namespace App\Http\Controllers;

use App\Events\FormComment;
use App\Events\FormSubmited;
use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;


    /**
     * initialization function
     */
    public function __construct()
    {
        $this->comment = new CommentService;
    }

    /**
     * Add user movie comment to the comment table
     *
     * @param \App\Http\Requests\CommentRequest $commentRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addComment(CommentRequest $commentRequest)
    {
        $commentRequest->validated();

        $attrs = $commentRequest;

        $this->comment->addComment($attrs);

        event(new FormSubmited([$commentRequest->comment, Auth::user()->fullname, $commentRequest->id, date('M-d H:i')]));

        return back();
    }
}