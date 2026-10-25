<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckAge;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', function () {
    return view('books');
});





Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])
    ->name('posts.edit');

Route::put('/posts/{id}', [PostController::class, 'update'])
    ->name('posts.update');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])
    ->name('posts.destroy');

Route::get('/restricted-content', function(){
    return '<h1> Welcome! you are old enough to view this content.</h1>';
})->middleware(CheckAge::class);

// Route to simulate setting the age in session
Route::get('/set-age/{age}', function ($age) {
    session(['age' => $age]);
    return "Age has been set to {$age} in the session. <a href='/restricted-content'>Try visiting restricted content</a>";
});