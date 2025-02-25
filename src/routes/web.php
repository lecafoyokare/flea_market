<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyopageController;
use Illuminate\Support\Facades\Auth;

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

route::group(['prefix' => ''],function() {
  Route::get('',[HomeController::class,'index']);
  Route::get('search', [HomeController::class, 'search']);
  Route::get('register', [AuthController::class, 'register']);
  Route::get('login', [AuthController::class, 'login']);
  Route::get('/your', [HomeController::class, 'your']);
  Route::post('/yourMethod', [HomeController::class, 'yourMethod']);
} );

Route::group(['middleware' => 'auth'], function () {
  Route::get('page=mylist', [HomeController::class, 'pageMylist']);
});

Route::group(['prefix' => 'item'], function() {
  Route::get('{item_id}', [ItemController::class, 'item_view']);
  Route::post('mylist', [ItemController::class, 'mylist']);
});

Route::group(['prefix' => 'user','middleware' => 'auth'], function () {

});

Route::group(['prefix' => 'mypage', 'middleware' => 'auth'], function () {
  Route::get('', [MyopageController::class, 'mypage']);
  Route::get('profile', [MyopageController::class, 'profile']);
  Route::post('profile/add', [MyopageController::class, 'add']);
});

Route::get('/laravel', function () {
    return view('welcome');
});
