<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChefController;
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

//-------------------public--------------------
Route::get('/login', [UserAuthController::class, 'login'])->name('login');
Route::post('/login', [UserAuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/register', [UserAuthController::class, 'registerPost'])->name('register.post');
//-------------------private--------------------
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');
Route::post('/addOrder', [UserController::class, 'addOrder'])->name('addOrder');
Route::get('/editOrder/{id}', [UserController::class, 'editOrderShow'])->name('editOrderShow');
Route::post('/editOrder/{id}', [UserController::class, 'editOrder'])->name('editOrder');
Route::get('/deleteOrder/{id}', [UserController::class, 'deleteOrder'])->name('deleteOrder');


//---------------------------------CHEF-----------------------------------//

Route::get("/chef", [ChefController::class, 'login_index'])->name('chef.login_index');
Route::post("chef/login", [ChefController::class, 'login'])->name('chef.login');
Route::post("chef/register", [ChefController::class, 'register'])->name('chef.register');
Route::get("chef/register_index", [ChefController::class, 'register_index'])->name('chef.register_index');
Route::get("chef/dashboard", [ChefController::class, 'index'])->name('chef.index');
Route::get("chef/display_accepted_orders", [ChefController::class, 'display_accepted_orders'])->name('chef.display_accepted_orders');
Route::post("chef/accept_order/{order_id}", [ChefController::class, 'accept_order'])->name('chef.accept_order');
Route::get("chef/display_not_accepted_orders", [ChefController::class, 'display_not_accepted_orders'])->name('chef.display_not_accepted_orders');
Route::post("chef/mark_order_done/{order_id}", [ChefController::class, 'mark_order_done'])->name('chef.mark_order_done');
