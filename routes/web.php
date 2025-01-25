<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

///////////////////////////////////////////////////////// dashboard views for reference
Route::get('admin', [DashboardAdminController::class, 'dashboard'])->name('admin.index');
Route::get('admin/form', [DashboardAdminController::class, 'form'])->name('admin.form');
Route::get('admin/error', [DashboardAdminController::class, 'error'])->name('admin.error');
Route::get('admin/buttons', [DashboardAdminController::class, 'buttons'])->name('admin.buttons');
Route::get('admin/blank', [DashboardAdminController::class, 'blank'])->name('admin.blank');
Route::get('admin/chart', [DashboardAdminController::class, 'chart'])->name('admin.chart');
Route::get('admin/element', [DashboardAdminController::class, 'element'])->name('admin.element');
Route::get('admin/signin', [DashboardAdminController::class, 'signin'])->name('admin.signin');
Route::get('admin/signup', [DashboardAdminController::class, 'signup'])->name('admin.signup');
Route::get('admin/table', [DashboardAdminController::class, 'table'])->name('admin.table');
Route::get('admin/typography', [DashboardAdminController::class, 'typography'])->name('admin.typography');
Route::get('admin/widget', [DashboardAdminController::class, 'widget'])->name('admin.widget');
////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/', function () {
    return view('welcome');
});
/////////////////////// orders logic
Route::get('/orders', [OrderController::class, 'index'])->name("order.index");
Route::get('/orders/create', [OrderController::class, 'create'])->name("orders.create");
Route::post('/orders', [OrderController::class, 'store']);
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('order.delete');
////////////////////////////////////////////////////////////////////////////////
// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


