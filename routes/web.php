<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('index');

//---------------------------------User-----------------------------------//
//--public
Route::get('/login', [UserAuthController::class, 'login'])->name('login');
Route::post('/login', [UserAuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/register', [UserAuthController::class, 'registerPost'])->name('register.post');
//--private
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');
Route::post('/addOrder', [UserController::class, 'addOrder'])->name('addOrder');
Route::get('/editOrder/{id}', [UserController::class, 'editOrderShow'])->name('editOrderShow');
Route::post('/editOrder/{id}', [UserController::class, 'editOrder'])->name('editOrder');
Route::get('/deleteOrder/{id}', [UserController::class, 'deleteOrder'])->name('deleteOrder');
//---------------------------------Admin-----------------------------------//
//--public
Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'loginPost'])->name('admin.login.post');
//--private
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('admin/users/edit{id}', [AdminController::class, 'usersEdit'])->name('admin.users.edit');
Route::post('admin/users/edit{id}', [AdminController::class, 'usersEditPost'])->name('admin.users.edit.post');
Route::get('admin/users/delete{id}', [AdminController::class, 'userDelete'])->name('admin.users.delete');
Route::get('admin/users/add', [AdminController::class, 'userAdd'])->name('admin.users.add');
Route::post('admin/users/add', [AdminController::class, 'userAddPost'])->name('admin.users.add.post');

Route::get('admin/chefs', [AdminController::class, 'chefs'])->name('admin.chefs');
Route::get('admin/chefs/edit/{id}', [AdminController::class, 'chefsEdit'])->name('admin.chefs.edit');
Route::post('admin/chefs/edit/{id}', [AdminController::class, 'chefsEditPost'])->name('admin.chefs.edit.post');
Route::get('admin/chefs/delete/{id}', [AdminController::class, 'chefsDelete'])->name('admin.chefs.delete');
Route::get('admin/chefs/add', [AdminController::class, 'chefsAdd'])->name('admin.chefs.add');
Route::post('admin/chefs/add', [AdminController::class, 'chefsAddPost'])->name('admin.chefs.add.post');

Route::get('admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('admin/orders/edit{id}', [AdminController::class, 'ordersEdit'])->name('admin.orders.edit');
Route::post('admin/orders/edit{id}', [AdminController::class, 'ordersEditPost'])->name('admin.orders.edit.post');
Route::get('admin/orders/delete/{id}', [AdminController::class, 'ordersDelete'])->name('admin.orders.delete');
Route::get('admin/orders/add', [AdminController::class, 'ordersAdd'])->name('admin.orders.add');
Route::post('admin/orders/add', [AdminController::class, 'ordersAddPost'])->name('admin.orders.add.post');


//---------------------------------CHEF-----------------------------------//

Route::get("/chef", [ChefController::class, 'login_index'])->name('chef.login_index');
Route::post("chef/login", [ChefController::class, 'login'])->name('chef.login');
Route::get("chef/logout", [ChefController::class, 'logout'])->name('chef.logout');
Route::post("chef/register", [ChefController::class, 'register'])->name('chef.register');
Route::get("chef/register_index", [ChefController::class, 'register_index'])->name('chef.register_index');
Route::get("chef/dashboard", [ChefController::class, 'index'])->name('chef.index');
Route::get("chef/display_accepted_orders", [ChefController::class, 'display_accepted_orders'])->name('chef.display_accepted_orders');
Route::get("chef/accept_order/{order_id}", [ChefController::class, 'accept_order'])->name('chef.accept_order');
Route::get("chef/display_not_accepted_orders", [ChefController::class, 'display_not_accepted_orders'])->name('chef.display_not_accepted_orders');
Route::get("chef/mark_order_done/{order_id}", [ChefController::class, 'mark_order_done'])->name('chef.mark_order_done');
