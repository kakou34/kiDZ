<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    function subject(){
        return $this->belongsTo('App\Subject','subject_id');
    }

    function questions(){
        return $this->hasMany('App\Question');
    }

    function scopeSubjectCourses($query, $subject_id){
        return $query->where('subject_id', $subject_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
    function scopeNewSubjectCourses($query, $subject_id){
        return $query->where('subject_id', $subject_id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }
}
