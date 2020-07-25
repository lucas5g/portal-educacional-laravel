<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Http\Controllers\Controller;
use App\Registration;
use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    public function index(Request $request)
    {
        $registration = Registration::all();

        return $registration;
    }

    public function store(Request $request)
    {        
        $studentExist = User::where(['id' => $request->student_id, 'profile'=>'student' ])->first();

        if(!$studentExist){
            return response()->json(['error' => 'Student not registered'], 401);
        }

        $courseExist = Course::where(['id' => $request->course_id])->first();
        if(!$courseExist){
            return response()->json(['error' => 'Course not registered'], 401);
        }

        $studentHasCourse = Registration::where(['course_id' => $request->course_id, 'student_id'=> $request->student_id])->first();
        if($studentHasCourse){
            return response()->json(['error' => 'Student registered in the course'], 401);

        }

        
        $registration = new Registration();
        $registration->course_id = $request->course_id;
        $registration->student_id = $request->student_id;
        $registration->save();

        return $registration;
    }

    public function show(Registration $registration)
    {
        //
    }


    public function update(Request $request, Registration $registration)
    {
        //
    }

    
    public function destroy(Registration $registration)
    {
        //
    }
}
