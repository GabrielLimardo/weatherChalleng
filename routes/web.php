<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;


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
    return view('index');
});


Route::post('/test',[testController::class,'index']);

Route::get('/token', function () {
    return csrf_token();
});
