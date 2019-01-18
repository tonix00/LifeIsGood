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

// --------- Non-admin. --------------//
Route::get('/', 'PagesController@index');
Route::get('/archive', 'PagesController@getArchive');
Route::get('/detail/{id}', 'PagesController@getDetail');

// --------- Admin route here. --------------//
Route::get('/admin/logout', 'AdminsController@logout');
Route::get('/admin/login', 'AdminsController@getLoginPage');
Route::post('/admin/checkLogin', 'AdminsController@checkLogin');

// --------- only for login admin ----------//
Route::group(['middleware' => ['auth']], function() {
    
    // get method
    Route::get('/admin/post', 'AdminsController@getPost');
    Route::get('/admin/editable/{id}', 'AdminsController@viewEditablePost');
    Route::get('/admin/list', 'AdminsController@getList');
    Route::get('/admin', 'AdminsController@getList');

    // post method
    Route::post('/admin/addpost', 'AdminsController@addPost');
    Route::post('/admin/editpost/{id}', 'AdminsController@editPost');

});



