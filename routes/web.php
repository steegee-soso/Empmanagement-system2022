<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;

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


Route::group(['middleare'=>['XSS']], function(){
    Route::get('admin/login',[AdminController::class, 'login']);
    Route::get('admin',[AdminController::class, 'index']);
    Route::post('admin/login',[AdminController::class, 'submit_login']);
    Route::get('admin/logout',[AdminController::class, 'logout']);
    Route::get('admin/register',[AdminController::class,'register_user']);
    Route::post('admin/register',[AdminController::class,'register']);
});

//roles
    Route::group(['middleware'=>['XSS']], function(){
        Route::get('admin/role', [RoleController::class,'index']);
        Route::get('admin/department',[DepartmentController::class, 'index']);
    });

 //Department Controller
 Route::group(['middleware'=>['XSS']], function(){
    Route::get('admin/employee', [EmployeeController::class, 'index']);
 });



