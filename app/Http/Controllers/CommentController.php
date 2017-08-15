<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;

class CommentController extends Controller
{
    /**
     * 存储评论内容
     */
    public function store(Request $request)
    {
        if(Comment::create($request->all()))
        {
            return redirect()->back();
        }
        else
        {
            return redirect()->back()->withInput()->withErrors('评论发表失败！');
        }
    }
}
