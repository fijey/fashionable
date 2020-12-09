<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\MyProductController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\ManagementCategoryController;
use App\Http\Controllers\AuthController;

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



Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/category' , [ManagementCategoryController::class,'index']);
    Route::get('/managementuser/add' , [ManagementUserController::class,'addUser']);
    Route::post('/managementuser/add' , [ManagementUserController::class,'postUser']);
    Route::get('/managementuser/edit/{id}' , [ManagementUserController::class,'editUser']);
    Route::post('/managementuser/edit/{id}' , [ManagementUserController::class,'postEdit']);
    Route::get('/managementuser' , [ManagementUserController::class,'index']);
    Route::get('/edituser/{id}' , [ManagementUserController::class,'editUser']);
    Route::get('/deleteuser/{id}' , [ManagementUserController::class,'deleteUser']);
    Route::post('/category/add' , [ManagementCategoryController::class,'addCategory']);
    Route::get('/category/delete/{id}' , [ManagementCategoryController::class,'deleteCategory']);
    
});

Route::group(['middleware' => ['role:User|Admin']], function () {
    Route::get('/dashboard' , [DashboardController::class,'index']);
    Route::get('/createstore' , [AuthController::class,'createStore']);
    Route::post('/createstore' , [AuthController::class,'postStore']);
    Route::get('/logout' , [AuthController::class,'logout']);
    Route::get('/myprofile' , [UserProfileController::class,'index']);
    Route::get('/myproduct' , [MyProductController::class,'index']);
    Route::get('/addproduct' , [MyProductController::class,'addProduct']);
    Route::post('/postproduct' , [MyProductController::class,'postProduct']);
    Route::get('/deleteproduct/{id}' , [MyProductController::class,'deleteProduct']);
    Route::get('/editproduct/{id}' , [MyProductController::class,'editProduct']);
    Route::post('/editproduct/{id}' , [MyProductController::class,'updateProduct']);
    Route::post('/editprofile' , [UserProfileController::class,'editProfile']);
    Route::post('/editstore' , [UserProfileController::class,'editStore']);
    
});
Route::get('/' , [HomeController::class,'index']);
Route::get('/login' , [AuthController::class,'index']);
Route::post('/postlogin' , [AuthController::class,'postLogin']);
Route::get('/register' , [AuthController::class,'register']);
Route::post('/postregister' , [AuthController::class,'postRegister']);



