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

Route::get('/espace-perso','UserController@index')->name('home');
Route::get('/membres/{id}','UserController@show');
Route::get('/membres/{id}/parametres','UserController@account')->name('account');
Route::get('/groupes', 'GroupController@index');
Route::get('groupes/search',['uses'=>'GroupController@search','as'=>'groupes.search']);
Route::get('/groupes/creer','GroupController@create')->name('group.create');
Route::get('/room/{id}','RoomController@room');

Route::get('/deletePost/{post_id}',[
    'uses' =>'PostController@deletePost',
    'as'  =>'post.delete'
]);
Route::get('/get-last-post','PostController@getLastPost');

Route::post('/update-profile/{user_id}', [
    'uses' => 'UserController@updateProfile',
       'as'=> 'profile.update'
]);

Route::post('/edit', [
    'uses' => 'PostController@editPost' , 
    'as'  => 'edit'
]);

Route::post('/createPost/{id}', [
    'uses' =>'PostController@createPost',
    'as' => 'post.create'
]);


Route::post('/groupes/creer','GroupController@store');
Route::post('/groupes/quitter','GroupController@signOut')->name('group.signout');
Route::post('/groupes/adherer','GroupController@signIn')->name('group.signin');

Route::get('webrtc',function(){
    return view('webrtcdemo');
});

