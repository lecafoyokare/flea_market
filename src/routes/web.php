<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyopageController;
use App\Http\Controllers\PurchaseController;
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
  Route::get('page=mylist', [HomeController::class, 'pageMylist']);
  Route::get('search', [HomeController::class, 'search']);
  Route::get('message', [HomeController::class, 'messageView']);

  Route::get('register', [AuthController::class, 'register']);
  Route::post('register', [AuthController::class, 'registerPost']);
  Route::get('login', [AuthController::class, 'login']);
  Route::post('login', [AuthController::class, 'loginPost']);
  
  Route::get('/sell', [HomeController::class, 'sell']);
  Route::post('/sell/create', [HomeController::class, 'itemCreate']);
  Route::get('/your', [HomeController::class, 'your']);
  Route::post('/yourMethod', [HomeController::class, 'yourMethod']);
} );

Route::group(['middleware' => 'auth'], function () {
  
});

Route::group(['prefix' => 'item'], function() {
  Route::get('{item_id}', [ItemController::class, 'itemView']);
  Route::post('mylist', [ItemController::class, 'mylist']);
  Route::post('comment', [ItemController::class, 'comment']);
});

Route::group(['prefix' => 'purchase','middleware' => 'auth'], function () {
  Route::get('{item_id}', [PurchaseController::class, 'purchaseGet']);
  Route::get('/address/{item_id}', [PurchaseController::class, 'address']);
  Route::post('/address/update', [PurchaseController::class, 'addressUpdate']);
});

Route::group(['prefix' => 'mypage', 'middleware' => 'auth'], function () {
  Route::get('', [MyopageController::class, 'mypage']);
  Route::get('profile', [MyopageController::class, 'profile']);
  Route::post('profile/create', [MyopageController::class, 'profileCreate']);
});

Route::get('/laravel', function () {
    return view('welcome');
});
