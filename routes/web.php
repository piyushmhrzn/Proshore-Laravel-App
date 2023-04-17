<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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


Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/verifyUser', [AdminController::class, 'verifyUser'])->name('verifyUser');


// Route::group(['middleware' => 'auth'], function(){
//     Route::get('/', [AdminController::class, 'index'])->name('dashboard');
//     Route::resource('organization', OrganizationController::class);
//     Route::resource('employee', UserController::class)->except(['create']);
//     Route::get('/{id}', [UserController::class, 'create'])->name('employee.create');
// });

Route::get('/', [AdminController::class, 'index'])->name('dashboard');
Route::resource('organization', OrganizationController::class);
Route::resource('employee', UserController::class)->except(['create']);
Route::get('/{id}', [UserController::class, 'create'])->name('employee.create');









