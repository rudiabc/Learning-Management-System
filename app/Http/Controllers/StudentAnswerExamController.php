<?php

namespace App\Http\Controllers;

use App\Models\CourseAnswerExam;
use App\Models\CourseExam;
use App\Models\CourseQuestionExam;
use App\Models\StudentAnswerExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StudentAnswerExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CourseExam $courseExam, $questionexam)
    {
        //

        $question_details = CourseQuestionExam::where('id', $questionexam)->first();

        $validated = $request->validate([
            'answer_id' => 'required|exists:course_answer_exams,id'
        ]);

        DB::beginTransaction();

        try{
            $selectedAnswer = CourseAnswerExam::find($validated['answer_id']);

            if($selectedAnswer->course_question_exam_id != $questionexam){
                $error = ValidationException::withMessages([
                    'sysrem_error' => ['System error!' . ['Jawaban tidak tersedia pada pertanyaan']],
                ]);

                throw $error;
            }

            $existingAnswer = StudentAnswerExam::where('user_id', Auth::id())->where('course_question_exam_id', $questionexam)
            ->first();

            if($existingAnswer){
                $error = ValidationException::withMessages([
                    'sysrem_error' => ['System error!' . ['Kamu telah menjawab pertanyaan ini sebelumnya']],
                ]);

                throw $error;
            }

            $answerValue = $selectedAnswer->is_correct ? 'correct' : 'wrong';

            StudentAnswerExam::create([
                'user_id' => Auth::id(),
                'course_question_exam_id' => $questionexam,
                'answer' => $answerValue,
            ]);

            DB::commit();

            $nextQuestion = CourseQuestionExam::where('course_exam_id', $courseExam->id)
            ->where('id', '>', $questionexam)
            ->orderBy('id', 'asc')
            ->first();

            if($nextQuestion){
                return redirect()->route('admin.learning.course_exam', ['course_exam' => $courseExam->id, 'question' => $nextQuestion->id]);
            }
            else{
                return redirect()->route('admin.learning.finished.course_exam', $courseExam->id);
            }
        }
        catch(\Exception $e){
            DB::rollBack();
            $error = ValidationException::withMessages([
                'sysrem_error' => ['System error!' . $e->getMessage()],
            ]);

            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentAnswerExam $studentAnswerExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAnswerExam $studentAnswerExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAnswerExam $studentAnswerExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAnswerExam $studentAnswerExam)
    {
        //
    }
}
