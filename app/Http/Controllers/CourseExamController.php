<?php

namespace App\Http\Controllers;

use App\Models\CategoryExam;
use App\Models\CourseExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CourseExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $course_exams = CourseExam::orderBy('id', 'DESC')->get();
        return view('admin.course_exams.index', [
            'course_exams' => $course_exams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category_exams = CategoryExam::all();
        return view('admin.course_exams.create', [
            'category_exams' => $category_exams
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_exam_id' => 'required|integer',
            'cover' => 'required|image|mimes:png,jpg,jpeg,svg',
        ]);

        DB::beginTransaction();

        try{
            if($request->hasFile('cover')){
                $coverPath = $request->file('cover')->store('product_covers', 'public');
                $validated['cover'] = $coverPath;
            }
            $validated['slug'] = Str::slug($request->name);
            $newCourse = CourseExam::create($validated);

            DB::commit();

            return redirect()->route('admin.course_exams.index');
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
    public function show(CourseExam $courseExam)
    {
        //
        $students = $courseExam->studentexams()->orderBy('id', 'DESC')->get();
        $questions = $courseExam->questionexams()->orderBy('id', 'DESC')->get();

        return view('admin.course_exams.manage', [
            'courseExam' => $courseExam,
            'students' => $students,
            'questions' => $questions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseExam $courseExam)
    {
        //
        $category_exams = CategoryExam::all();
        return view('admin.course_exams.edit', [
            'courseExam' => $courseExam,
            'category_exams' => $category_exams,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseExam $courseExam)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_exam_id' => 'required|integer',
            'cover' => 'sometimes|image|mimes:png,jpg,jpeg,svg',
        ]);

        DB::beginTransaction();

        try{
            if($request->hasFile('cover')){
                $coverPath = $request->file('cover')->store('product_covers', 'public');
                $validated['cover'] = $coverPath;
            }
            $validated['slug'] = Str::slug($request->name);

            $courseExam->update($validated);

            DB::commit();

            return redirect()->route('admin.course_exams.index');
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
    public function destroy(CourseExam $courseExam)
    {
        //
        try{
            $courseExam->delete();
            return redirect()->route('admin.course_exams.index');
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
