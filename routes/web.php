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

Route::get('/search', 'AutoCompleteController@index')->name('search');
Route::post('/search/fetch', 'AutoCompleteController@fetch')->name('search.fetch');



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/ajax', function () {
//     return view('list');
// });

Route::get('/ajax', 'ListController@index');
Route::POST('/create', 'ListController@najmun')->name('create');
Route::get('/edit/{id}', 'ListController@edit')->name('edit');
Route::POST('/update', 'ListController@update')->name('update');
Route::post('/ajax/delete', 'ListController@delete')->name('ajax.delete');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



Route::resource('/love', 'PracticeController');
Route::post('/love', 'PracticeController@store')->name('love.store');
Route::get('/love/edit/{id}', 'PracticeController@edit')->name('love.edit');
Route::post('/love/update', 'PracticeController@update')->name('love.update');
Route::post('/delete', 'PracticeController@deletes')->name('pract.delete');









