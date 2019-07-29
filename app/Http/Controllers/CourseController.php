<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //function to load a game page according to the game id passed to the route
    function coursePage($id) {
        $course = Course::find($id);
        $questions = $course->questions;
        return view('course', compact('course', 'questions'));
    }
}
