<?php

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

//---------------------------------CHEF-----------------------------------//

Route::get("chef/", [ChefController::class, 'login_index'])->name('chef.login_index');
Route::post("chef/login", [ChefController::class, 'login'])->name('chef.login');
Route::get("chef/dashboard", [ChefController::class, 'index'])->name('chef.index');
Route::get("chef/display_orders", [ChefController::class, 'display_orders'])->name('chef.display_orders');
Route::post("chef/accept_order/{order_id}", [ChefController::class, 'accept_order'])->name('chef.accept_order');
