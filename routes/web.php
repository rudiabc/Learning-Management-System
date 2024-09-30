<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseExamController;
use App\Http\Controllers\CourseQuestionExamController;
use App\Http\Controllers\CourseStudentExamController;
use App\Http\Controllers\CourseVideoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LearningExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentAnswerExamController;
use App\Http\Controllers\SubscribeTransactionController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

Route::get('/', [FrontController::class, 'index'])->name('front.index');


Route::get('/details/{course:slug}', [FrontController::class, 'details'])->name('front.details');

Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');

Route::get('/pricing', [FrontController::class, 'pricing'])->name('front.pricing');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //mengharuskan login sebelum melakukan transaksi
    Route::get('/checkout', [FrontController::class, 'checkout'])->name('front.checkout')->middleware('role:student');

    Route::post('/checkout/store', [FrontController::class, 'checkout_store'])->name('front.checkout.store')->middleware('role:student');

    // domain.com/learning/IdCourse/IdVideo = belajar blablabla
    Route::get('/learning/{course}/{courseVideoId}', [FrontController::class, 'learning'])->name('front.learning')->middleware('role:student|teacher|owner');


    Route::prefix('admin')->name('admin.')->group(function (){
       Route::resource('categories', CategoryController::class)
       ->middleware('role:owner');

       Route::resource('teachers', TeacherController::class)
       ->middleware('role:owner');

       Route::resource('courses', CourseController::class)
       ->middleware('role:owner|teacher');

       Route::resource('subscribe_transactions', SubscribeTransactionController::class)
       ->middleware('role:owner');

       // halaman untuk menambahkan video
       Route::get('/add/video/{course:id}', [CourseVideoController::class, 'create'])
       ->middleware('role:teacher|owner')
       ->name('course.add_video');

       // rute untuk melakukan penyimpanan pada kelas terkait
       Route::post('/add/video/save/{course:id}', [CourseVideoController::class, 'store'])
       ->middleware('role:teacher|owner')
       ->name('course.add_video.save');

       Route::resource('course_videos', CourseVideoController::class)
       ->middleware('role:owner|teacher');

       // Examination
       Route::resource('course_exams', CourseExamController::class)
       ->middleware('role:teacher|owner');

       Route::get('/course_exam/question/create/{courseExam}', [CourseQuestionExamController::class, 'create'])
       ->middleware('role:teacher|owner')
       ->name('course_exam.create.question');

       Route::post('/course_exam/question/save/{courseExam}', [CourseQuestionExamController::class, 'store'])
       ->middleware('role:teacher|owner')
       ->name('course_exam.create.question.store');

       Route::resource('course_question_exams', CourseQuestionExamController::class)
       ->middleware('role:teacher|owner');

       Route::get('/course_exam/students/show/{courseExam}', [CourseStudentExamController::class, 'index'])
       ->middleware('role:teacher|owner')
       ->name('course_exam.course_student_exams.index');

       Route::get('/course_exam/students/create/{courseExam}', [CourseStudentExamController::class, 'create'])
       ->middleware('role:teacher|owner')
       ->name('course_exam.course_student_exams.create');

       Route::post('/course_exam/students/create/save/{courseExam}', [CourseStudentExamController::class, 'store'])
       ->middleware('role:teacher|owner')
       ->name('course_exam.course_student_exams.store');


       Route::get('/learning/finished/{courseExam}', [LearningExamController::class, 'learning_finished'])
       ->middleware('role:student')
       ->name('learning.finished.course_exam');

       Route::get('/learning/rapport/{courseExam}', [LearningExamController::class, 'learning_rapport'])
       ->middleware('role:student')
       ->name('learning.rapport.course_exam');

       // Menampilkan beberapa kelas yang diberikan oleh guru
       Route::get('/learning', [LearningExamController::class, 'index'])
       ->middleware('role:student')
       ->name('learning.index');

       Route::get('/learning/{course_exam}/{question}', [LearningExamController::class, 'learning'])
       ->middleware('role:student')
       ->name('learning.course_exam');

       Route::post('/learning/{course_exam}/{question}', [StudentAnswerExamController::class, 'store'])
       ->middleware('role:student')
       ->name('learning.course_exam.answer_exam.store');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

require __DIR__.'/auth.php';
