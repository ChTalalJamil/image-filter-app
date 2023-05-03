<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


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
Route::post('/save-image', [ImageController ::class , 'upload'])->name('save-image');

Route::get('/', function(){
    return view('welcome');
} );

Route::get('/display-image', function(){
    return view('display-image');
} )->name('display-image');

