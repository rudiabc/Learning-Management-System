<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseQuestionExam extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function courseexam(){
        return $this->belongsTo(CourseExam::class, 'course_exam_id');
    }

    public function answerexams(){
        return $this->hasMany(CourseAnswerExam::class, 'course_question_exam_id', 'id');
    }
}
