<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SuperAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::group([], function () {
    Route::controller(SuperAdminController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin.index');
        Route::get('/admin/users', 'users')->name('admin.users');
        Route::get('/admin/users/create', 'createUser')->name('admin.users.create');
        Route::post('/admin/users/create', 'storeUser')->name('admin.users.store');
        Route::get('/admin/users/edit/{id}', 'editUser')->name('admin.users.edit');
        Route::post('/admin/users/edit/{id}', 'updateUser')->name('admin.users.update');
        Route::delete('/admin/users/delete/{id}', 'deleteUser')->name('admin.users.delete');
    });
});