<?php

namespace App\Http\Controllers;

use App\Course;
use App\Question;
use App\Subject;
use Illuminate\Http\Request;

class EditCourseController extends Controller
{
    function loadEdition($courseID) {
        $course = Course::find($courseID);
        $subjects = Subject::all();
        return view('CMS.editCourse', compact( 'course', 'subjects'));
    }

    function editCourse($courseID, Request $request) {
        $data = request()->validate([
            'courseName'=> 'required',
            'videoLink'=> 'required',
            'subjectId'=> 'required'
        ]);
        $id = getYoutubeID($request->input('videoLink'));

        //updating the course in the DB
        $result = Course::where('id', $courseID)
                     ->update(['name' => $request->input('courseName'),
                               'subject_id' => $request->input('subjectId'),
                               'video_link' => $id]);

        return response()->json(['success'=>'La leçon a été modifiée']);
    }

    function addQuestion ($courseID){
        $data = request()->validate ([
            'question'=>'required', 'option1'=>'required',
            'option2'=>'required', 'option3'=>'required',
            'correct'=>'required'
        ]);
        $question = new Question();
        $question->question = \request('question');
        $question->option1 = \request('option1');
        $question->option2 = \request('option2');
        $question->option3 = \request('option3');
        $question->correct = \request('correct');
        $question->course_id = $courseID;
        $question->save();
        return back();
    }

    //function to delete a selected question
    public function deleteQuestion($question_id) {
        $result = Question::destroy($question_id);
        return back();
    }
}
