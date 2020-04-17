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

use App\Http\Controllers\BookCommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');

Route::delete('books/{book}', 'BookController@destroy');
Route::get('books/{book}/edit', 'BookController@edit');
Route::put('books/{book}', 'BookController@update');
Route::post('books/store', 'BookController@store');
Route::get('books/create', 'BookController@create');
Route::get('books/{book}', 'BookController@show');
Route::get('books', 'BookController@index');

Route::resource(
    'books.comments',
    'BookCommentController',
    ['only' => ['store', 'update', 'destroy']]
);
