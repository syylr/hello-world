<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

class ArticleController extends Controller
{
    /**
     * 展示评论
     * @param type $id
     */
    public function show($id)
    {
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }
}
