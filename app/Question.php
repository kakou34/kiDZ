<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    function course(){
        return $this->belongsTo('App\Course');
    }

    function scopeCourseQuestions($query, $courseID){
        return $query->where('course_id', $courseID)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
