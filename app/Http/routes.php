<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/now',function(){
//    return date('Y-m-d H:i:s');
//});//for testing TODO

//Route::get('{model}/lists', function ($model) {
//  $className = 'App\Http\Controllers\\'.ucfirst($model).'Controller';
//  $obj = new $className;
//  return $obj->lists();
//});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::group(['middleware' => ['web']], function () {
//    //
//});

//Route::group(['middleware' => 'web'], function () {
//    Route::auth();
//    Route::get('/', 'HomeController@index');
////    Route::get('/home', 'HomeController@index');
//});
//
//
//Route::group(['middleware' => 'web', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {  
//    Route::get('/', 'HomeController@index');
//    Route::resource('article', 'ArticleController');
////    Route::get('article', 'ArticleController@index');
//});
//
//Route::get('article/{id}','ArticleController@show');
//
//Route::post('comment','CommentController@store');


Route::get('now', function () {
    return date("Y-m-d H:i:s");
});
Route::auth();
Route::get('/', 'HomeController@index');
Route::get('article/{id}', 'ArticleController@show');
Route::post('comment', 'CommentController@store');
Route::group(['middleware' => 'web', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::resource('article', 'ArticleController');
});



//Route::group(['middleware' => ['web']], function () {
//
//    Route::get('/', function () {
//        return view('welcome');
//    })->middleware('guest');
//
//    Route::get('/tasks', 'TaskController@index');
//    Route::post('/task', 'TaskController@store');
//    Route::delete('/task/{task}', 'TaskController@destroy');
//
//    Route::auth();
//
//});
