<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ADMIN ROUTE START HERE
Route::get('/admin', function(){
    echo "Hello Admin";
})->middleware('auth','admin');

//PRESS ROUTE START HERE
Route::get('/press', function(){
    echo "Hello Press";
})->middleware('auth','press');



//OFFICE ROUTE START HERE
Route::get('/office', function(){
    echo "Hello Office";
})->middleware('auth','office');


//AGENT ROUTE START HERE
Route::get('/agent', function(){
    echo "Hello Agent";
})->middleware('auth','agent');

Route::get('/customer', function(){
    echo "Hello Customer";
})->middleware('auth','customer');



//UPDATE ProfileController
Route::resource('profile', 'ProfileController');
Route::resource('task', 'TaskController');

Route::get('/task/admin-task-list','TaskController@adminShowTask')->name('adminShowTask');

Route::resource('news', 'NewsController');
Route::get('news-list', 'NewsController@news_list')->name('news_list');

Route::resource('admin-news', 'AdminNewsController');
Route::get('/admin-news/change-pbstatus/{id}', 'AdminNewsController@changeStatusPB')->name('changeStatusPB');
Route::get('/admin-news/change-vlstatus/{id}', 'AdminNewsController@changeStatusViolated')->name('changeStatusViolated');
Route::get('/admin-news/change-rvstatus/{id}', 'AdminNewsController@changeStatusReview')->name('changeStatusReview');
Route::get('/admin-news/move-to-trash/{id}', 'AdminNewsController@AdminNewsMovetoTrash')->name('AdminNewsMovetoTrash');