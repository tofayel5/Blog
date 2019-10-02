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

Route::get('/','HomeController@index')->name('home');

Route::get('post/{slug}','PostController@details')->name('post.details');
Route::get('posts','PostController@index')->name('post.index');
Route::get('/category/{slug}','PostController@postByCategory')->name('category.posts');
Route::get('/tag/{slug}','PostController@postByTag')->name('tag.posts');


Route::post('subscriber','SubscriberController@store')->name('subscriber.store');

Route::get('profile/{username}','AuthorController@profile')->name('author.profile');

Route::get('/search','SearchController@search')->name('search');

Auth::routes();
//Auth::routes(['register' => false]);

Route::group(['middleware'=>['auth']],function (){
    Route::post('favorite/{post}/add','FavoriteController@add')->name('post.favorite');
    Route::post('comment/{post}','CommentController@store')->name('comment.store');
});



Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']],function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('comments','CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');

    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');

    Route::resource('post','PostController');

    Route::get('/favorite','FavoriteController@index')->name('favorite.index');


});

View::composer('layouts.frontend.partial.footer',function ($view){
    $category = App\Category::all();
    $view->with('categories',$category);
});
