<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\http\Controllers\TaskController@index');

Route::get('/create', 'App\http\Controllers\TaskController@create');
Route::post('/simpan', 'App\http\Controllers\TaskController@store');

Route::get('/edit/{id}', 'App\http\Controllers\TaskController@edit');
Route::put('/update/{id}', 'App\http\Controllers\TaskController@update');

Route::delete('/delete/{id}', 'App\http\Controllers\TaskController@destroy');

Route::get('/completed', 'App\http\Controllers\TaskController@completed');
Route::get('/incomplete', 'App\http\Controllers\TaskController@incomplete');

Route::prefix('tasks')->group(function (){
    Route::put('{tasks:id}/status', 'App\http\Controllers\TaskController@updateStatus')->name('tasks.updateStatus');
});
// Route::put('/updatestatus', 'App\http\Controllers\TaskController@status');