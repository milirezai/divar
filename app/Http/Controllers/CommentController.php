<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Controllers\AdminController;
use App\Requests\Admin\CommentRequest;
use System\Auth\Auth;

class CommentController extends AdminController
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comment.index',compact('comments'));
    }
    public function show($id)
    {
        $comment = Comment::find($id);
        return view('admin.comment.show',compact('comment'));
    }
    public function approved($id)
    {
        $comment = Comment::find($id);
        $approved = $comment->approved == 0 ? 1 : 0;
        Comment::update(['id' => $id, 'approved' => $approved]);
        return back();
    }
    public function answer($id)
    {
        $replyComment = Comment::find($id);
        $request = new CommentRequest();
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $inputs['parent_id'] = $replyComment->id;
        $inputs['status'] = 0;
        $inputs['approved'] = 1;
        $inputs['post_id'] = $replyComment->post_id;
        Comment::create($inputs);
        return redirect(route('admin.comment.index'));
    }
}