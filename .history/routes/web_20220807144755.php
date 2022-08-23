<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductController2; // import các controller vào để sử dụng
use App\Http\Controllers\CustomerController;

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
// web.php là nơi tùy biến các router
Route::get('/', function () {
    return view('welcome');
});

// define routers/page
Route::get('list', // dùng method static get để truy cập tới đường link tên là list
[ProductController::class, // giá trị trả về là ProductController
'index']); // và hàm index của ProductController sẽ là hàm thực thi
Route::get('add', [ProductController::class, 'add']);
Route::post('save', [ProductController::class, 'save']);
Route::get('edit/{id}', [ProductController::class, 'edit']);
Route::post('update', [ProductController::class, 'update']);
Route::get('delete/{id}', [ProductController::class, 'delete']);

Route::get('/', [ProductController2::class, 'index']);
Route::get('cars', [ProductController2::class, 'getProducts']);
Route::get('about', [ProductController2::class, 'getAbout']);
Route::get('contact', [ProductController2::class, 'getContact']);


Route::get('register', [CustomerController::class, 'register']);
Route::get('login', [CustomerController::class, 'login']);
Route::post('register-process', [CustomerController::class, 'registerProcess'])->name('register-process');
Route::post('login-process', [CustomerController::class, 'loginProcess'])->name('login-process');
Route::get('logout', [CustomerController::class, 'logout']);