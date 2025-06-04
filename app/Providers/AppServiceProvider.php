<?php

namespace App\Providers;

use App\interfaces\AnsewerInterface;
use App\Interfaces\AssignmentInterface;
use App\Interfaces\CertificateInterface;
use App\Interfaces\commentInterface;
use App\Interfaces\EnrollmentsInterface;
use App\Interfaces\LessonInterface;
use App\Interfaces\PaymentInterface;
use App\Interfaces\QuizesInterface;
use App\Repository\AnswerRepository;
use App\Repository\AssignmentRepository;
use App\Repository\CertificateRepository;
use App\Repository\CommentRepository;
use App\Repository\EnrollmentRepository;
use App\Repository\lessonRepository;
use App\Repository\PaymentRepository;
use App\Repository\QuizRepository;
use Illuminate\Support\ServiceProvider;
use Tymon\JWTAuth\Http\Middleware\Authenticate as JWTMiddleware;
use App\Interfaces\CoursesInterface;
use App\Repository\CourseRepository;
use App\Interfaces\QuestionInterface;
use App\Repository\QuestionRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CoursesInterface::class,CourseRepository::class);
        $this->app->bind(LessonInterface::class,lessonRepository::class);
        $this->app->bind(QuizesInterface::class,QuizRepository::class);
        $this->app->bind(QuestionInterface::class,QuestionRepository::class);
        $this->app->bind(AnsewerInterface::class,AnswerRepository::class);
        $this->app->bind(commentInterface::class,CommentRepository::class);
        $this->app->bind(CertificateInterface::class,CertificateRepository::class);
        $this->app->bind(AssignmentInterface::class,AssignmentRepository::class);
        $this->app->bind(EnrollmentsInterface::class,EnrollmentRepository::class);
        $this->app->bind(PaymentInterface::class,PaymentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app('router')->aliasMiddleware('auth.jwt', JWTMiddleware::class);
    }
}
