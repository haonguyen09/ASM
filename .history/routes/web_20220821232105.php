<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductController2; // dùng lệnh USE để import các controller vào để sử dụng
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;


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

Route::get('list2',[ProducerController::class, 'index2']); 
Route::get('add2', [ProducerController::class, 'add2']);
Route::post('save2', [ProducerController::class, 'save2']);
Route::get('edit2/{id}', [ProducerController::class, 'edit2']); // đây là kiểu router có tham số, tìm trong ProducerController sẽ thấy tham số $id trong hàm edit
Route::post('update2', [ProducerController::class, 'update2']);
Route::get('delete2/{id}', [ProducerController::class, 'delete2']);


Route::get('/', [ProductController2::class, 'index']);
Route::get('cars', [ProductController2::class, 'getProducts']);
Route::get('/', [ProductController2::class, 'getProductsforHomePage']);
Route::get('about', [ProductController2::class, 'getAbout']);
Route::get('contact', [ProductController2::class, 'getContact']);
Route::get('details/{id}', [ProductController2::class, 'details']);



Route::get('register', [CustomerController::class, 'register']);
Route::get('login', [CustomerController::class, 'login']);
Route::post('register-process', [CustomerController::class, 'registerProcess'])->name('register-process');// dat ten cho route
Route::post('login-process', [CustomerController::class, 'loginProcess'])->name('login-process');
Route::get('logout', [CustomerController::class, 'logout']);
Route::get('customerList', [CustomerController::class, 'edit2']);
Route::get('information/{id}', [CustomerController::class, 'information']);
Route::post('save-information', [CustomerController::class, 'saveinformation'])->name('save-information');
Route::get('/change-password', [CustomerController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [CustomerController::class, 'updatePassword'])->name('update-password');
Route::get('deleteCustomer/{id}', [CustomerController::class, 'deleteCustomer']);

Route::get('loginAdmin', [AdminController::class, 'login']);
Route::post('loginAdmin-process', [AdminController::class, 'loginAdminProcess'])->name('loginAdmin-process');
Route::get('customerAccount',[AdminController::class,'customerAccount']);
Route::get('adminAccount',[AdminController::class,'adminAccount']);
Route::get('dashboard',[AdminController::class,'dashboard']);
Route::get('/logoutAdmin', [AdminController::class, 'logoutAdmin']);


// function admin

Route::get('addAdmin', [AdminController::class, 'addAdmin']);
Route::post('saveAdmin', [AdminController::class, 'saveAdmin']);
Route::get('editAdmin/{id}', [AdminController::class, 'editAdmin']); // đây là kiểu router có tham số, tìm trong AdminController sẽ thấy tham số $id trong hàm edit
Route::post('updateAdmin', [AdminController::class, 'updateAdmin']);
Route::get('deleteAdmin/{id}', [AdminController::class, 'deleteAdmin']);



