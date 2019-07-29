<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use Illuminate\Http\Request;

class CmsLearnController extends Controller
{
    //function to fetch stored subjects for selec elements and load cmslearn page
    public function fetchLists() {
        $subjects = Subject::all();
        return view('CMS.cmslearn', compact('subjects'));
    }
    //function to add a new subject
    public function storeSubject() {

        $data = request()->validate([
            'subjectName'=> 'required'
        ]);

        $show = new Subject();
        $show->name = request('subjectName');
        $show->save();

        return back();
    }
    //function to delete an existing subject
    public function deleteSubject($subjectID) {
        $result = Subject::destroy($subjectID);
        return back();
    }

    //function to add a new course
    public function storeCourse() {
        $data = request()->validate([
            'courseName'=> 'required',
            'videoLink'=> 'required',
            'subjectId'=> 'required'
        ]);
        $id = getYoutubeID(request('videoLink'));
        $course = new Course();
        $course->name = request('courseName');
        $course->subject_id = request('subjectId');
        if($id){
            $course->video_link = $id;
        }
        $course->save();
        return back();
    }

    //function to find courses by their subject
    public function searchCourses($subject_id){
        $courses = Course::subjectCourses($subject_id);
        return view('CMS.searchTableCourses', compact( 'courses'));
        //dd($courses);
    }

    //function to delete a selected course
    public function deleteCourse($course_id) {
        $result = Course::destroy($course_id);
        return back();
    }
}
