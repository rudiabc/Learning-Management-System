<?php

namespace App\Http\Controllers;

use App\Models\CourseExam;
use App\Models\CourseQuestionExam;
use App\Models\StudentAnswerExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningExamController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        $my_courses = $user->courseexams()->with('categoryexam')->orderBy('id', 'DESC')->get();

        // Supaya apabila ketika sedang mengerjakan soal dan tiba tiba perangkat mati maka akan melanjutkan dari soal yg terakhir dikerjakan
        foreach($my_courses as $course_exam){
            $totalQuestionsCount = $course_exam->questionexams()->count();

            $answeredQuestionsCount = StudentAnswerExam::where('user_id', $user->id)
            ->whereHas('questionexam', function ($query) use ($course_exam){
                $query->where('course_exam_id', $course_exam->id);
            })->distinct()->count('course_question_exam_id');

            if($answeredQuestionsCount < $totalQuestionsCount){
                $firstUnansweredQuestion = CourseQuestionExam::where('course_exam_id', $course_exam->id)
                ->whereNotIn('id', function($query) use ($user){
                    $query->select('course_question_exam_id')->from('student_answer_exams')
                    ->where('user_id', $user->id);
                })->orderBy('id', 'asc')->first();

                $course_exam->nextQuestionId = $firstUnansweredQuestion ? $firstUnansweredQuestion->id : null;
            }
            else{
                $course_exam->nextQuestionId = null;
            }
        }

        return view('student.courses.index', [
            'my_courses' => $my_courses,
        ]);
    }

    public function learning(CourseExam $courseExam, $questionexam){
        $user = Auth::user();

        $isEnrolled = $user->courseexams()->where('course_exam_id', $courseExam->id)->exists();

        if(!$isEnrolled){
            abort(404);
        }

        $currentQuestion = CourseQuestionExam::where('course_exam_id', $courseExam->id)->where('id', $questionexam)->firstOrFail();

        return view('student.courses.learning', data: [
            'courseExam' => $courseExam,
            'questionexam' => $currentQuestion,
        ]);

    }

    public function learning_finished(CourseExam $courseExam){
        return view('student.courses.learning_finished', data: [
            'courseExam' => $courseExam,
        ]);
    }

    public function learning_rapport(CourseExam $courseExam){

        $userId = Auth::id();

        $studentAnswers = StudentAnswerExam::with('questionexam')
        ->whereHas('questionexam', function($query) use ($courseExam){
            $query->where('course_exam_id', $courseExam->id);
        })->where('user_id', $userId)->get();

        $totalQuestions = CourseQuestionExam::where('course_exam_id', $courseExam->id)->count();
        $correctAnswersCount = $studentAnswers->where('answer', 'correct')->count();

        // kondisi untuk nilai minimal kelulusan
        $passed = $correctAnswersCount == $totalQuestions;

        return view('student.courses.learning_rapport', data: [
            'passed' => $passed,
            'courseExam' => $courseExam,
            'studentAnswers' => $studentAnswers,
            'totalQuestions' => $totalQuestions,
            'correctAnswersCount' => $correctAnswersCount,
        ]);
    }
}
