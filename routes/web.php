<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
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
    return view('auth.login');
});

Auth::routes();
//1
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/edit-product-request/{id}', [App\Http\Controllers\HomeController::class, 'editRequestProduct']);
Route::post('/edit-product-request', [App\Http\Controllers\HomeController::class, 'updateRequestProduct']);
Route::get('/product-request-process', [App\Http\Controllers\HomeController::class, 'productrequestprocess']);
Route::get('/product-request-finish', [App\Http\Controllers\HomeController::class, 'productrequestfinish']);
Route::get('/product-request-create', [App\Http\Controllers\HomeController::class, 'productRequestCreate']);
Route::post('/product-request-create', [App\Http\Controllers\HomeController::class, 'productRequestAdd']);
//2
Route::get('/maintenance', [App\Http\Controllers\HomeController::class, 'maintenance']);
Route::get('/edit-maintenance/{id}', [App\Http\Controllers\HomeController::class, 'editMaintenance']);
Route::post('/edit-maintenance', [App\Http\Controllers\HomeController::class, 'updateMaintenance']);
Route::get('/add-maintenance', [App\Http\Controllers\HomeController::class, 'createMaintenance']);
Route::post('/add-maintenance', [App\Http\Controllers\HomeController::class, 'addMaintenance']);
//3
Route::get('/client', [App\Http\Controllers\HomeController::class, 'client']);
Route::get('/edit-client/{id}', [App\Http\Controllers\HomeController::class, 'editClient']);
Route::post('/edit-client', [App\Http\Controllers\HomeController::class, 'updateClient']);
Route::get('/add-client', [App\Http\Controllers\HomeController::class, 'createClient']);
Route::post('/add-client', [App\Http\Controllers\HomeController::class, 'addClient']);
//4
Route::get('/product', [App\Http\Controllers\HomeController::class, 'product']);
Route::get('/edit-product/{id}', [App\Http\Controllers\HomeController::class, 'editProduct']);
Route::post('/edit-product', [App\Http\Controllers\HomeController::class, 'updateProduct']);
Route::get('/add-product', [App\Http\Controllers\HomeController::class, 'createProduct']);
Route::post('/add-product', [App\Http\Controllers\HomeController::class, 'addProduct']);
//5
Route::get('/package', [App\Http\Controllers\HomeController::class, 'package']);
Route::get('/edit-package/{id}', [App\Http\Controllers\HomeController::class, 'editPackage']);
Route::post('/edit-package', [App\Http\Controllers\HomeController::class, 'updatePackage']);
Route::get('/add-package', [App\Http\Controllers\HomeController::class, 'createPackage']);
Route::post('/add-package', [App\Http\Controllers\HomeController::class, 'addPackage']);
//delete
Route::post('delete-customer', [App\Http\Controllers\HomeController::class, 'deleteCustomer']);
Route::post('/delete-product-request', [App\Http\Controllers\HomeController::class, 'deleteProductRequest']);
Route::post('/delete-maintetance-request', [App\Http\Controllers\HomeController::class, 'deleteMaintenanceRequest']);
Route::post('/delete-product', [App\Http\Controllers\HomeController::class, 'deleteProduct']);
Route::post('/delete-package', [App\Http\Controllers\HomeController::class, 'deletePackage']);
Route::get('/export', [App\Http\Controllers\HomeController::class, 'export']);






