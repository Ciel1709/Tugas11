<?php

use App\Http\Controllers\biodata;
use Illuminate\Support\Facades\Route;

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

Route::get('/biodata-showAll',[biodata::class,"showAll"]);
Route::get('/biodata/{id}',[biodata::class,"showOne"]);

Route::post('/biodata-insert',[biodata::class,"store"]);
Route::post('/biodata-update/{id}',[biodata::class,"update"]);

Route::delete('/biodata-delete/{id}',[biodata::class,"destroy"]);

