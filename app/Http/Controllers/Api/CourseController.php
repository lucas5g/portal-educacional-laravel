<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
  
    public function index()
    {
        // $courses = Course::all()->disciplines();
        $courses = Course::with('disciplines')->get();
        return $courses;
    }

    public function store(Request $request)
    {
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->date_start = $request->date_start;
        $course->date_end = $request->date_end;

        $course->save();

        return $course;

    }


    public function show(Course $course)
    {
        return $course::with('disciplines')->find($course);
        return $course;
    }

    public function update(Request $request, Course $course)
    {
        $course->title = $request->title;
        $course->description = $request->description;
        $course->date_start = $request->date_start;
        $course->date_end = $request->date_end;

        $course->save();

        return $course;
    }

    public function destroy(Course $course)
    {
        //
    }
}
