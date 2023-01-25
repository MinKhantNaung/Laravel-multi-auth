<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/normal_users', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/users', [UserController::class, 'index']);

    Route::get('/users/edit/{id}', [UserController::class, 'edit']);

    Route::post('/users/update/{id}', [UserController::class, 'update']);

    Route::get('/managers', [ManagerController::class, 'index']);

    Route::get('/supervisors', [SupervisorController::class, 'index']);

    Route::get('/staffs', [StaffController::class, 'index']);

    Route::get('/roles', [RoleController::class, 'index']);
});
