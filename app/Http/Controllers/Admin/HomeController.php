<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * 构造函数调用登陆中间件
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * 后台首页
     * @return type
     */
    public function index()  
    {
        return view('admin/home');
    }
}
