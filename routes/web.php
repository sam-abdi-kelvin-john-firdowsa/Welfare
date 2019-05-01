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


Route::get('/student/{id}/dash', 'PagesController@studentDash');
Route::get('/student/{id}/profile', 'PagesController@studentProfile');
Route::get('/student/{id}/complaint', 'PagesController@studentComplaint'); 
Route::get('/student/{id}/my_hist', 'PagesController@studentHistory'); 
Route::get('/student/{id}/rate_service', 'PagesController@student_rating'); 
Route::get('/studhlp/{id}', 'PagesController@student_help');
Route::get('/about', 'PagesController@about');

//Config the Admin Protected Routes
Route::get('admin/dash', 'HomeController@admin')->middleware('admin');
Route::get('admin/profile', 'HomeController@adminProf')->middleware('admin');
Route::get('admin/my_hist', 'HomeController@adminHist')->middleware('admin');

//Route::get('/student/{id}/complaint/{cid}/show', 'PagesController@showSpecificComplaint');

/* These are the routes for the chat controller, view etc */
Route::get('/student/{id}/complaint/{cid}/show', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
