/*create the necessary routes for our API */
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('user', 'UserController@show');
    Route::put('user', 'UserController@update');

    Route::get('articles', 'ArticleController@index');
    Route::post('articles', 'ArticleController@store');

    Route::group(['middleware' => ['can:isWriter']], function () {
        Route::get('articles/{id}', 'ArticleController@show');
        Route::put('articles/{id}', 'ArticleController@update');
        Route::delete('articles/{id}', 'ArticleController@destroy');
    });

    Route::group(['middleware' => ['can:isEditor']], function () {
        Route::get('articles/{id}/comments', 'CommentController@index');
        Route::post('articles/{id}/comments', 'CommentController@store');
    });
});
