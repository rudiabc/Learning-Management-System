<?php

namespace App\Http\Controllers;

use App\Models\CourseExam;
use App\Models\CourseStudentExam;
use App\Models\StudentAnswerExam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CourseStudentExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CourseExam $courseExam)
    {
        //
        $students = $courseExam->studentexams()->orderBy('id', 'DESC')->get();
        $questions = $courseExam->questionexams()->orderBy('id', 'DESC')->get();
        $totalQuestions = $questions->count();

        foreach($students as $student){
            $studentAnswers = StudentAnswerExam::whereHas('questionexam', function($query) use ($courseExam){
                $query->where('course_exam_id', $courseExam->id);
            })->where('user_id', $student->id)->get();

            $answerCount = $studentAnswers->count();
            $correctAnswersCount = $studentAnswers->where('answer', 'correct')->count();

            if($answerCount == 0){
                $student->status = 'Belum Mengerjakan';
            } elseif($correctAnswersCount < $totalQuestions){ //menentukan status lulus atau tidak
                $student->status = 'Tidak Lulus';
            } elseif($correctAnswersCount == $totalQuestions){
                $student->status = 'Lulus';
            }
        }

        return view('admin.students.index', [
            'courseExam' => $courseExam,
            'questions' => $questions,
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CourseExam $courseExam)
    {
        //
        $students = $courseExam->studentexams()->orderBy('id', 'DESC')->get();
        return view('admin.students.add_student', [
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
        $request->validate([
            'email' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            $error = ValidationException::withMessages([
                'system_error' => ['Email student tidak tersedia!'],
            ]);
            throw $error;
        }

        $isEnrolled = $courseExam->studentexams()->where('user_id', $user->id)->exists();

        if($isEnrolled){
            $error = ValidationException::withMessages([
                'system_error' => ['Student sudah memiliki hak akses kelas'],
            ]);
            throw $error;
        }

        DB::beginTransaction();

        try{
            $courseExam->studentexams()->attach($user->id);
            DB::commit();
            return redirect()->route('admin.course_exam.course_student_exams.index', $courseExam);
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
    public function show(CourseStudentExam $courseStudentExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseStudentExam $courseStudentExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseStudentExam $courseStudentExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseStudentExam $courseStudentExam)
    {
        //
    }
}
