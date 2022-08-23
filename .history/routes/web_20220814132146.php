<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductController2; // dùng lệnh USE để import các controller vào để sử dụng
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SearchController;


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

Route::get('/search',[SearchController::class, 'search'])->name('web.search');
Route::get('/find',[SearchController::class, 'find'])->name('web.find');

// define routers/page, route nó nằm vai trò chỉ đường cho yêu cầu (request) đi đến đâu.
/*
Nếu vậy thì tiện đây mình cũng giải đáp luôn, 
như ở trên mình đã nói get và post nhận 2 request hoàn toàn khác nhau là GET và POST. 
Bạn nên sử dụng get cho việc lấy dữ liệu như hiển thị bài viết, lấy dữ tiệu bằng ajax, ... 
Nên sử dụng post khi có thao tác thay đổi cơ sở dữ như thêm, xóa, hay sửa dữ liệu.
*/
Route::get('list', // dùng method static get để truy cập tới đường link tên là list
[ProductController::class, // giá trị trả về là ProductController
'index']); // và hàm index của ProductController sẽ là hàm thực thi
Route::get('add', [ProductController::class, 'add']);
Route::post('save', [ProductController::class, 'save']);
Route::get('edit/{id}', [ProductController::class, 'edit']); // đây là kiểu router có tham số, tìm trong ProductController sẽ thấy tham số $id trong hàm edit
Route::post('update', [ProductController::class, 'update']);
Route::get('delete/{id}', [ProductController::class, 'delete']);

Route::get('/', [ProductController2::class, 'index']);
Route::get('#', [ProductController::class, 'index2']);
Route::get('cars', [ProductController2::class, 'getProducts']);
Route::get('about', [ProductController2::class, 'getAbout']);
Route::get('contact', [ProductController2::class, 'getContact']);
Route::get('details/{id}', [ProductController2::class, 'details']);



Route::get('register', [CustomerController::class, 'register']);
Route::get('login', [CustomerController::class, 'login']);
Route::post('register-process', [CustomerController::class, 'registerProcess'])->name('register-process');
Route::post('login-process', [CustomerController::class, 'loginProcess'])->name('login-process');
Route::post('', [CustomerController::class,'loginProcessForAdmin'])
Route::get('logout', [CustomerController::class, 'logout']);