<?php

Route::get('dashboard','DashboardController@index')->name('dashboard');

Route::get('settings','SettingsController@index')->name('settings');
Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
Route::put('password-update','SettingsController@updatePassword')->name('password.update');

Route::resource('tag','TagController');
Route::resource('category','CategoryController');
Route::resource('post','PostController');
/**
 *
 */
//Route::resource([
//    'tag' => 'TagController',
//    'category' => 'CategoryController'
//    //'post' => 'PostController'
//]);

Route::get('pending/post','PostController@pending')->name('post.pending');
Route::put('/post/{id}/approve','PostController@approval')->name('post.approve');

Route::get('/favorite','FavoriteController@index')->name('favorite.index');

Route::get('authors','AuthorController@index')->name('author.index');
Route::delete('authors/{id}','AuthorController@destroy')->name('author.destroy');

Route::get('comments','CommentController@index')->name('comment.index');
Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');

Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
Route::delete('/subscriber/{id}','SubscriberController@destroy')->name('subscriber.destroy');
