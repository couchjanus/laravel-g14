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

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'BlogController@index')->name('blog.index');
    // Route::get('/{id}', 'BlogController@show')->name('show');
    Route::get('/{slug}', 'BlogController@show')->name('blog.show');
});

Route::namespace('Admin')
    ->prefix('admin')
    ->as('admin.')
	->group(function () {
        Route::get('/', 'DashboardController'); 	 
        Route::get('posts/status', 'PostController@getPostsByStatus')->name('posts.status'); 	 
        
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
        Route::get('users/trashed', 'UserController@trashed')->name('users.trashed');
        Route::post('users/restore/{id}', 'UserController@restore')->name('users.restore');
        Route::delete('users/force/{id}', 'UserController@force')->name('users.force');
    	Route::resource('users', 'UserController');
});

// Route::get('about', 'AboutController')->name('about');
// Route::get('contact-us', 'ContactController@index')->name('contact');

// Еще какие-то маршруты....

Route::fallback(function() {
    return "Oops… How you've trapped here?";
});
