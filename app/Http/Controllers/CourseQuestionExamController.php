<?php

namespace App\Http\Controllers;

use App\Models\CourseExam;
use App\Models\CourseQuestionExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CourseQuestionExamController extends Controller
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
    public function create(CourseExam $courseExam)
    {
        //
        $students = $courseExam->studentexams()->orderBy('id', 'DESC')->get();
        return view('admin.questions.create', [
            'courseExam' => $courseExam,
            'students' => $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CourseExam $courseExam)
    {
        //
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answers' => 'required|array',
            'answers.*' => 'required|string',
            'correct_answer' => 'required|integer',
        ]);

        DB::beginTransaction();

        try{

            $question = $courseExam->questionexams()->create([
                'question' => $request->question,
            ]);

            foreach($request->answers as $index => $answerText){
                $isCorrect = ($request->correct_answer == $index);
                $question->answerexams()->create([
                    'answer' => $answerText,
                    'is_correct' => $isCorrect,
                ]);
            }

            DB::commit();

            return redirect()->route('admin.course_exams.show', $courseExam->id);
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
    public function show(CourseQuestionExam $courseQuestionExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseQuestionExam $courseQuestionExam)
    {
        //
        $courseExam =  $courseQuestionExam->courseexam;
        $students = $courseExam->studentexams()->orderBy('id', 'DESC')->get();
        return view('admin.questions.edit', [
            'courseQuestionExam' => $courseQuestionExam,
            'courseExam' => $courseExam,
            'students' => $students,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseQuestionExam $courseQuestionExam)
    {
        //
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answers' => 'required|array',
            'answers.*' => 'required|string',
            'correct_answer' => 'required|integer',
        ]);

        DB::beginTransaction();

        try{

            $courseQuestionExam->update([
                'question' => $request->question,
            ]);

            $courseQuestionExam->answerexams()->delete();
            foreach($request->answers as $index => $answerText){
                $isCorrect = ($request->correct_answer == $index);
                $courseQuestionExam->answerexams()->create([
                    'answer' => $answerText,
                    'is_correct' => $isCorrect,
                ]);
            }

            DB::commit();

            return redirect()->route('admin.course_exams.show', parameters: $courseQuestionExam->course_exam_id);
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
     * Remove the specified resource from storage.
     */
    public function destroy(CourseQuestionExam $courseQuestionExam)
    {
        //
        try{
            $courseQuestionExam->delete();
            return redirect()->route('admin.course_exams.show', $courseQuestionExam->course_exam_id);
        }
        catch(\Exception $e){
            DB::rollBack();
            $error = ValidationException::withMessages([
                'sysrem_error' => ['System error!' . $e->getMessage()],
            ]);

            throw $error;
        }
    }
}
