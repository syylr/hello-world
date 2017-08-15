<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    /**
     * 后台没登录不允许查看后台文章
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * 后台article首页
     * @return type
     */
    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
    }
    
    /**
     * 后台新增文章页
     * @return type
     */
    public function create()
    {
        return view('admin/article/create');
    }
    
    /**
     * 存储数据到表中
     */
    public function store(Request $request)
    {
        //数据验证
        $this->validate($request, array(
            'title'=>'required|unique:articles|max:255',//// 必填、在 articles 表中唯一、最大长度 255
            'body'=>'required'//必填
        ));
        // 通过 Article Model 插入一条数据进 articles 表
        $article=new Article;//初始化一个article模型
        $article->title=$request->get('title');// 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
        $article->body=$request->get('body');// 将 POST 提交过了的 body 字段的值赋给 article 的 body 属性
        $article->user_id=$request->user()->id;// 获取当前 Auth 系统中注册的用户，并将其 id 赋给 article 的 user_id 属性
        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if($article->save())
        {
            return redirect('admin/article');// 保存成功，跳转到 文章管理 页
        }
        else
        {
             // 保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }
    
    /**
     * 编辑文章
     * @param type $id
     */
    public function edit($id)
    {
        return view('admin/article/edit')->withArticle(Article::find($id));
//        $article=Article::find($id);
//        return view('admin/article/edit',compact('article'));//compact — 建立一个数组，包括变量名和它们的值 
    }
    
    public function update(Request $request,$id)
    { 
        $this->validate($request, array(
            'title'=>'required|unique:articles|max:255',
            'body'=>'required'
        ));
        $article=Article::find($id);
        $article->title=$request->get('title');
        $article->body=$request->get('body');
        $article->user_id=$request->user()->id;
        if($article->save())
        {
            return redirect('admin/article');
        }
        else
        {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
        
    }

        /**
     * 删除文章
     * @param type $id
     * @return type
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
    
}
