<?php
use App\Http\Controllers\api\auth\AuthController;
use App\Http\Controllers\api\student\commentController;
use App\Http\Controllers\api\student\CourseController;
use App\Http\Controllers\api\student\enrollmentController;
use App\Http\Controllers\api\student\lessonController;
use App\Http\Middleware\api\ownComment;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'course',
], function () {
    Route::controller(CourseController::class)->group(
        function () {
            Route::get('/all', 'allCourses');
            Route::get('/detail/{id}', 'courseDetail');
        }

    );
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'lesson',
], function () {
    Route::controller(lessonController::class)->group(
        function () {
            Route::get('/detail/{id}', 'lessonDetails');
        }
    );
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'comment',
], function () {
    Route::controller(commentController::class)->group(
        function () {
            Route::post('/add/{lessonId}', 'addComment')->middleware('jwt.auth');
            Route::get('/all/{lessonId}', 'allComments');
            Route::post('/update/{id}', 'updateComment')->middleware('jwt.auth', ownComment::class);
            Route::delete('/delete/{id}', 'deleteComment')->middleware('jwt.auth', ownComment::class);
        }
    );
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'enrollment',
], function () {
    Route::controller(enrollmentController::class)->group(
        function () {
            Route::get('/all', 'allEnrollments')->middleware('jwt.auth');
            Route::post('/enroll/{courseId}', 'enrollCourse')->middleware('jwt.auth');
        }
    );
});
