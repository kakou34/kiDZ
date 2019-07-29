<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use Illuminate\Http\Request;

class LearnController extends Controller
{
    function subjectPage($subject_id) {
        $subject = Subject::find($subject_id);
        $courses = Course::subjectCourses($subject_id);
        $newCourses = Course::newSubjectCourses($subject_id);
        return view( 'learn', compact('subject', 'courses', 'newCourses'));
    }
}
