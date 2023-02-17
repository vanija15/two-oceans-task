<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// User registration
Route::post('/register', 'UserController@register');

// User authentication
Route::post('/login', 'UserController@login');

// User profile
Route::get('/user', 'UserController@profile');
Route::put('/user', 'UserController@updateProfile');

// Articles
Route::get('/articles', 'ArticleController@index');
Route::post('/articles', 'ArticleController@store');
Route::get('/articles/{id}', 'ArticleController@show');
Route::put('/articles/{id}', 'ArticleController@update');
Route::delete('/articles/{id}', 'ArticleController@destroy');

// Comments
Route::get('/articles/{id}/comments', 'CommentController@index');
Route::post('/articles/{id}/comments', 'CommentController@store');
Route::get('/comments/{id}', 'CommentController@show');
Route::put('/comments/{id}', 'CommentController@update');
Route::delete('/comments/{id}', 'CommentController@destroy');

