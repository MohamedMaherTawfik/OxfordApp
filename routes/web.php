<?php

use App\Http\Controllers\admin\teacherController;
use App\Http\Middleware\Teacher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SuperAdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Middleware\CheckAdmin;

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::get('/', [\App\Http\Controllers\home\homeController::class, 'index'])->name('home');
    Route::get('/courses', [\App\Http\Controllers\home\homeController::class, 'courses'])->name('courses');
    Route::get('/courses/{slug}', [\App\Http\Controllers\home\homeController::class, 'showCourse'])->name('course.show');
    Route::get('/courses/lessons/{slug}', [\App\Http\Controllers\home\homeController::class, 'showLesson'])->name('lesson.show');
    Route::get('/courses/quiz/{id}', [\App\Http\Controllers\home\homeController::class, 'showQuiz'])->name('quiz.show');
    Route::post('/courses/quiz/{id}', [\App\Http\Controllers\home\homeController::class, 'submitQuiz'])->name('quiz.submit');
    Route::get('/courses/project/{slug}', [\App\Http\Controllers\home\homeController::class, 'showProject'])->name('project.show');
});
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
        Route::get('/admin/applies/pending', 'pending')->name('admin.applies');
        Route::get('/admin/applies/accepted', 'accepted')->name('admin.accepts');
        Route::get('/admin/applies/rejected', 'rejected')->name('admin.rejects');
        Route::get('/admin/applies/accept/{id}', 'acceptApply')->name('admin.applies.accept');
        Route::get('/admin/applies/reject/{id}', 'rejectApply')->name('admin.applies.reject');
        Route::get('/admin/courses/all', 'allCourses')->name('admin.courses.all');
        Route::delete('/admin/courses/delete', 'deleteCourse')->name('admin.courses.delete');
        Route::get('/admin/categories', 'categories')->name('admin.categories');
        Route::get('/admin/categories/create', 'createCategory')->name('admin.categories.create');
        Route::post('/admin/categories/create', 'storeCategory')->name('admin.categories.store');
        Route::get('/admin/categories/edit/{id}', 'editCategory')->name('admin.categories.edit');
        Route::post('/admin/categories/edit/{id}', 'updateCategory')->name('admin.categories.update');
        Route::delete('/admin/categories/delete/{id}', 'deleteCategory')->name('admin.categories.delete');
        Route::get('/admin/chat', 'speakWithAi')->name('admin.chat');
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


Route::group([
    'middleware' => ['auth', Teacher::class],
], function () {
    Route::controller(teacherController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/dashboard/courses/create', 'createCourse')->name('teacher.courses.create');
        Route::post('/dashboard/courses/create', 'storeCourse')->name('teacher.courses.store');
        Route::get('/dashboard/courses/edit/{slug}', 'editCourse')->name('teacher.courses.edit');
        Route::post('/dashboard/courses/edit/{slug}', 'updateCourse')->name('teacher.courses.update');
        Route::delete('/dashboard/courses/delete/{id}', 'deleteCourse')->name('teacher.courses.delete');
        Route::get('/dashboard/courses/{slug}', 'showCourse')->name('teacher.courses.show');
        Route::get('/dashboard/courses/lessons/create/{slug}', 'createLesson')->name('teacher.lessons.create');
        Route::post('/dashboard/courses/lessons/create/{slug}', 'storeLesson')->name('teacher.lessons.store');
        Route::get('/dashboard/courses/lessons/edit/{slug}', 'editLesson')->name('teacher.lessons.edit');
        Route::post('/dashboard/courses/lessons/edit/{slug}', 'updateLesson')->name('teacher.lessons.update');
        Route::delete('/dashboard/courses/lessons/delete/{id}', 'deleteLesson')->name('teacher.lessons.delete');
        Route::get('/dashboard/courses/lessons/{slug}', 'showLesson')->name('teacher.lessons.show');
        Route::get('/dashboard/courses/lessons/quiz/create/{slug}', 'createQuiz')->name('teacher.quiz.create');
        Route::post('/dashboard/courses/quiz/create/{slug}', 'storeQuiz')->name('teacher.quiz.store');
        Route::post('/dashboard/courses/quiz/{id}', 'deleteQuiz')->name('teacher.quiz.delete');
        Route::get('/dashboard/courses/project/all/{slug}', 'allProjects')->name('teacher.project.all');
        Route::get('/dashboard/courses/project/create/{slug}', 'createProject')->name('teacher.project.create');
        Route::post('/dashboard/courses/project/create/{slug}', 'storeProject')->name('teacher.project.store');
        Route::get('/dashboard/courses/project/edit/{slug}', 'editProject')->name('teacher.project.edit');
        Route::post('/dashboard/courses/project/edit/{id}', 'updateProject')->name('teacher.project.update');
        Route::get('/dashboard/courses/project/show/{slug}', 'showProject')->name('teacher.project.show');
        Route::delete('/dashboard/courses/project/{id}', 'deleteProject')->name('teacher.project.delete');
    });
});