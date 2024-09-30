<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseExam extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function categoryexam(){
        return $this->belongsTo(CategoryExam::class, 'category_exam_id');
    }

    public function questionexams(){
        return $this->hasMany(CourseQuestionExam::class, 'course_exam_id', 'id');
    }

    public function studentexams(){
        return $this->belongsToMany(User::class, 'course_student_exams', 'course_exam_id', 'user_id');
    }
}
