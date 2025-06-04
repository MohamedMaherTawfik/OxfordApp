<?php

use App\Http\Controllers\admin\AnswerController;
use App\Http\Controllers\admin\AssignmentController;
use App\Http\Controllers\admin\CertificateController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\lessonController;
use App\Http\Controllers\admin\QuestionController;
use App\Http\Controllers\admin\QuizController;
use App\Http\Controllers\api\auth\AuthController;
use App\Http\Controllers\user\CommentController;
use App\Http\Middleware\adminCheck;
use App\Http\Middleware\belongTo;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('jwt.auth');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('jwt.auth');
    Route::post('/profile', [AuthController::class, 'profile'])->middleware('jwt.auth');
    Route::get('/user/course', [AuthController::class, 'userCourses'])->middleware('jwt.auth');
});

// Route::controller(CourseController::class)->group(function () {
//     Route::get('/courses', 'index');
//     Route::get('/course/{id}', 'find');
//     Route::post('/course', 'store')->middleware('jwt.auth')->middleware(adminCheck::class);
//     Route::post('/course/{id}', 'update')->middleware('jwt.auth')->middleware(adminCheck::class);
//     Route::delete('/course/{id}', 'destroy')->middleware('jwt.auth')->middleware(adminCheck::class);
// });

// Route::controller(lessonController::class)->group(function () {
//     Route::get('course/{id}/lessons', 'allLessons');
//     Route::get('/lesson/{id}', 'findLesson');
//     Route::post('course/{id}/lesson', 'storeLesson')->middleware(adminCheck::class);
//     Route::post('/lesson/{id}', 'updateLesson')->middleware(belongTo::class, adminCheck::class);
//     Route::delete('/lesson/{id}', 'deleteLesson')->middleware(belongTo::class, adminCheck::class);
// });

// Route::controller(QuizController::class)->group(function () {
//     Route::get('lesson/{id}/quizes', 'index');
//     Route::get('/quiz/{id}', 'find');
//     Route::post('lesson/{id}/quiz', 'store')->middleware(adminCheck::class);
//     Route::post('/quiz/{id}', 'update')->middleware(belongTo::class, adminCheck::class);
//     Route::delete('/quiz/{id}', 'destroy')->middleware(belongTo::class, adminCheck::class);
// });

// Route::controller(QuestionController::class)->group(function () {
//     Route::get('quiz/{id}/questions', 'index');
//     Route::get('/question/{id}', 'find');
//     Route::post('quiz/{id}/question', 'store')->middleware(adminCheck::class);
//     Route::post('/question/{id}', 'update')->middleware(belongTo::class, adminCheck::class);
//     Route::delete('/question/{id}', 'destroy')->middleware(belongTo::class, adminCheck::class);
// });

// Route::controller(QuestionController::class)->group(function () {
//     Route::get('quiz/{id}/questions', 'index');
//     Route::get('/question/{id}', 'find');
//     Route::post('quiz/{id}/question', 'store')->middleware(adminCheck::class);
//     Route::post('/question/{id}', 'update')->middleware(belongTo::class, adminCheck::class);
//     Route::delete('/question/{id}', 'destroy')->middleware(belongTo::class, adminCheck::class);
// });


// Route::controller(AnswerController::class)->group(function () {
//     Route::get('question/{id}/answers', 'index');
//     Route::get('/answer/{id}', 'find');
//     Route::post('question/{id}/answer', 'store');
//     Route::post('/answer/{id}', 'update');
//     Route::delete('/answer/{id}', 'destroy');
// });


// Route::controller(CommentController::class)->group(function () {
//     Route::get('lesson/{id}/comments', 'index');
//     Route::get('/comment/{id}', 'find');
//     Route::post('lesson/{id}/comment', 'store');
//     Route::post('/comment/{id}', 'update')->middleware(belongTo::class);
//     Route::delete('/comment/{id}', 'destroy')->middleware(belongTo::class);
// });


// Route::controller(CertificateController::class)->group(function () {
//     Route::get('course/{id}/certificates', 'index');
//     Route::get('/certificate/{id}', 'find');
//     Route::post('course/{id}/certificate', 'store')->middleware(adminCheck::class);
//     Route::post('/certificate/{id}', 'update')->middleware(belongTo::class, adminCheck::class);
//     Route::delete('/certificate/{id}', 'delete')->middleware(belongTo::class, adminCheck::class);
// });


// Route::controller(AssignmentController::class)->group(function () {
//     Route::get('lesson/{id}/assignments', 'index');
//     Route::get('/assignment/{id}', 'find');
//     Route::post('lesson/{id}/assignment', 'store')->middleware(adminCheck::class);
//     Route::post('/assignment/{id}', 'update')->middleware(belongTo::class, adminCheck::class);
//     Route::delete('/assignment/{id}', 'destroy')->middleware(belongTo::class, adminCheck::class);
// });
