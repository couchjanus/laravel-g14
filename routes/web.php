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

Route::get('/get-by-category', function () {
    $posts = App\Post::where('status', 2)
    ->with('category')
    ->get();
    dump($posts);
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'BlogController@index')->name('blog.index');
    Route::get('/{slug}', 'BlogController@show')->name('blog.show');
    Route::get('category/{id}', 'BlogController@getPostsByCategory')->name('blog.category');
});

Route::get('/feedback', 'FeedbackController@create');
Route::post('/feedback/create', 'FeedbackController@store');

Route::middleware('admin')->namespace('Admin')
    ->prefix('admin')
    ->as('admin.')
	->group(function () {
        Route::get('/', 'DashboardController');
        Route::get('feedbacks', 'FeedbackController@index')->name('feedbacks.index');
        Route::get('feedbacks/delete/{id}', 'FeedbackController@destroy');
 
        Route::get('posts/status', 'PostController@getPostsByStatus')->name('posts.status'); 	 
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
        Route::get('users/trashed', 'UserController@trashed')->name('users.trashed');
        Route::post('users/restore/{id}', 'UserController@restore')->name('users.restore');
        Route::delete('users/force/{id}', 'UserController@force')->name('users.force');
        Route::resource('users', 'UserController');
        Route::resource('tags', 'TagController');
});



// Route::get('about', 'AboutController')->name('about');
// Route::get('contact-us', 'ContactController@index')->name('contact');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/session', 'HomeController@showRequest')->name('session');

Route::get('/home', function () {
    return redirect('profile');
});

Route::middleware('web')->group(function () {
    Route::middleware('auth')
    ->prefix('profile')
    ->as('profile.')
	->group(function () {
        Route::get('', 'ProfileController@index')
            ->name('home');
        Route::get('info', 'ProfileController@info')
            ->name('info');
        Route::put('store', 'ProfileController@store')
            ->name('store');
    });
});
// Еще какие-то маршруты....

Route::fallback(function() {
    return "Oops… How you've trapped here?";
});
