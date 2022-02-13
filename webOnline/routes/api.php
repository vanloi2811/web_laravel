<?php

use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Models\ProductGroup;
use App\Http\Controllers\ProductGroupController;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Models\Account;
use App\Http\Controllers\AccountController;
use App\Models\Address;
use App\Http\Controllers\AddressController;
use App\Models\Customer;
use App\Http\Controllers\CustomerController;
use App\Models\Employee;
use App\Http\Controllers\EmployeeController;
use App\Models\EmployeeGroup;
use App\Http\Controllers\EmployeeGroupController;
use App\Models\Order;
use App\Http\Controllers\OrderController;
use App\Models\OrderDetail;
use App\Http\Controllers\OrderDetailController;
use App\Models\Permission;
use App\Http\Controllers\PermissionController;
use App\Models\Role;
use App\Http\Controllers\RoleController;
use App\Models\StockAdjust;
use App\Http\Controllers\StockAdjustController;
use App\Models\StockAdjustDetail;
use App\Http\Controllers\StockAdjustDetailController;
use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::put('/product/update/{product}', [ProductController::class, 'update']);
Route::delete('/product/delete/{product}', [ProductController::class, 'destroy']);

Route::get('/productgroups', [ProductGroupController::class, 'index']);
Route::post('/productgroup', [ProductGroupController::class, 'store']);
Route::get('/productgroup/{id}', [ProductGroupController::class, 'show']);
Route::put('/productgroup/update/{productgroup}', [ProductGroupController::class, 'update']);
Route::delete('/productgroup/delete/{productgroup}', [ProductGroupController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::post('/category', [CategoryController::class, 'store']);
Route::put('/category/update/{category}', [CategoryController::class, 'update']);
Route::delete('/category/delete/{category}', [CategoryController::class, 'destroy']);

Route::get('/accounts', [AccountController::class, 'index']);
Route::get('/account/{id}', [AccountController::class, 'show']);
Route::post('/account', [AccountController::class, 'store']);
Route::put('/account/update/{account}', [AccountController::class, 'update']);
Route::delete('/account/delete/{account}', [AccountController::class, 'destroy']);

Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/employee/{id}', [EmployeeController::class, 'show']);
Route::post('/employee', [EmployeeController::class, 'store']);
Route::put('/employee/update/{employee}', [EmployeeController::class, 'update']);
Route::delete('/employee/delete/{employee}', [EmployeeController::class, 'destroy']);

Route::get('/employeegroups', [EmployeeGroupController::class, 'index']);
Route::get('/employeegroup/{id}', [EmployeeGroupController::class, 'show']);
Route::post('/employeegroup', [EmployeeGroupController::class, 'store']);
Route::put('/employeegroup/update/{employeegroup}', [EmployeeGroupController::class, 'update']);
Route::delete('/employeegroup/delete/{employeegroup}', [EmployeeGroupController::class, 'destroy']);

Route::get('/roles', [RoleController::class, 'index']);
Route::get('/role/{id}', [RoleController::class, 'show']);
Route::post('/role', [RoleController::class, 'store']);
Route::put('/role/update/{role}', [RoleController::class, 'update']);
Route::delete('/role/delete/{role}', [RoleController::class, 'destroy']);

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::post('/order', [OrderController::class, 'store']);
Route::put('/order/update/{order}', [OrderController::class, 'update']);
Route::delete('/order/delete/{order}', [OrderController::class, 'destroy']);

Route::get('/orderdetails', [OrderDetailController::class, 'index']);
Route::get('/orderdetail/{id}', [OrderDetailController::class, 'show']);
Route::post('/orderdetail', [OrderDetailController::class, 'store']);
Route::put('/orderdetail/update/{orderdetail}', [OrderDetailController::class, 'update']);
Route::delete('/orderdetail/delete/{orderdetail}', [OrderDetailController::class, 'destroy']);

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customer/{id}', [CustomerController::class, 'show']);
Route::post('/customer', [CustomerController::class, 'store']);
Route::put('/customer/update/{customer}', [CustomerController::class, 'update']);
Route::delete('/customer/delete/{customer}', [CustomerController::class, 'destroy']);

Route::get('/addresss', [AddressController::class, 'index']);
Route::get('/address/{id}', [AddressController::class, 'show']);
Route::post('/address', [AddressController::class, 'store']);
Route::put('/address/update/{address}', [AddressController::class, 'update']);
Route::delete('/address/delete/{address}', [AddressController::class, 'destroy']);

Route::get('/permissions', [PermissionController::class, 'index']);
Route::get('/permission/{id}', [PermissionController::class, 'show']);
Route::post('/permission', [PermissionController::class, 'store']);
Route::put('/permission/update/{permission}', [PermissionController::class, 'update']);
Route::delete('/permission/delete/{permission}', [PermissionController::class, 'destroy']);

Route::get('/stockadjusts', [StockAdjustController::class, 'index']);
Route::get('/stockadjust/{id}', [StockAdjustController::class, 'show']);
Route::post('/stockadjust', [StockAdjustController::class, 'store']);
Route::put('/stockadjust/update/{stockadjust}', [StockAdjustController::class, 'update']);
Route::delete('/stockadjust/delete/{stockadjust}', [StockAdjustController::class, 'destroy']);

Route::get('/stockadjustdetails', [StockAdjustDetailController::class, 'index']);
Route::get('/stockadjustdetail/{id}', [StockAdjustDetailController::class, 'show']);
Route::post('/stockadjustdetail', [StockAdjustDetailController::class, 'store']);
Route::put('/stockadjustdetail/update/{stockadjustdetail}', [StockAdjustDetailController::class, 'update']);
Route::delete('/stockadjustdetail/delete/{stockadjustdetail}', [StockAdjustDetailController::class, 'destroy']);

Route::post('/upload', [FileController::class, 'upload']);
