<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SuperAdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Middleware\CheckAdmin;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group([
    'middleware' => ['auth', CheckAdmin::class],
], function () {
    Route::controller(SuperAdminController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin.index');
        Route::get('/admin/users', 'users')->name('admin.users');
        Route::get('/admin/teachers', 'teachers')->name('admin.teachers');
        Route::get('/admin/users/show/{id}', 'showUser')->name('admin.users.show');
        Route::get('/admin/users/create', 'createUser')->name('admin.users.create');
        Route::post('/admin/users/create', 'storeUser')->name('admin.users.store');
        Route::get('/admin/users/edit/{id}', 'editUser')->name('admin.users.edit');
        Route::post('/admin/users/edit/{id}', 'updateUser')->name('admin.users.update');
        Route::delete('/admin/users/delete/{id}', 'deleteUser')->name('admin.users.delete');
        Route::get('admin/applies/pending', 'pending')->name('admin.applies');
        Route::get('admin/applies/accepted', 'accepted')->name('admin.accepts');
        Route::get('admin/applies/rejected', 'rejected')->name('admin.rejects');
        Route::get('admin/applies/accept/{id}', 'acceptApply')->name('admin.applies.accept');
        Route::get('admin/applies/reject/{id}', 'rejectApply')->name('admin.applies.reject');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'signUp')->name('register');
    Route::post('/register', 'register')->name('signup');
    Route::get('/teacher', 'teacherRegister')->name('teacher');
    Route::post('/teacher', 'teacher')->name('teacher');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'signin')->name('signin');
    Route::post('/logout', 'logout')->name('logout');
});