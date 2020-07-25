<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Http\Controllers\Controller;
use App\Discipline;
use App\User;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
  
    public function index()
    {
        // $disciplines = Discipline::with('course')->get();
        $disciplines = Discipline::all();
        
        return $disciplines;

    }

    public function store(Request $request)
    {
        $nameExist = Discipline::where('title', $request->title)->first();

        if($nameExist){
            return response()->json(['error'=>'Name is already registered'], 401);
        }

        $teacherExist = User::where(['id' => $request->teacher_id, 'profile' => 'teacher'])->first();
        if(!$teacherExist){
            return response()->json(['error'=>'Teacher not registered'], 401);
        }

        $courseExist = Course::where(['id' => $request->course_id])->first();
        if(!$courseExist){
            return response()->json(['error'=>'Course not registered'], 401);
        }


        $discipline = new Discipline();
        $discipline->title = $request->title;
        $discipline->description = $request->description;
        $discipline->course_id = $request->course_id;
        $discipline->teacher_id = $request->teacher_id;
        $discipline->save();
        return $discipline;
        
    }

   
    public function show(Discipline $discipline)
    {
        return $discipline::with('course')->find($discipline);
    }


    public function update(Request $request, Discipline $discipline)
    {
        // $nameExist = Discipline::where('title', $request->title)->first();

        
        // if($nameExist){
        //     return response()->json(['error'=>'Name is already registered'], 409);
        // }

        $teacherExist = User::where(['id' => $request->teacher_id, 'profile' => 'teacher'])->first();
        if(!$teacherExist){
            return response()->json(['error'=>'Teacher not registered'], 404);
        }

        $courseExist = Course::where(['id' => $request->course_id])->first();
        if(!$courseExist){
            return response()->json(['error'=>'Course not registered'], 404);
        }

        $discipline->title = $request->title;
        $discipline->description = $request->description;
        $discipline->course_id = $request->course_id;
        $discipline->teacher_id = $request->teacher_id;
        $discipline->save();
        return $discipline;
    }

    public function destroy(Discipline $discipline)
    {
        //
    }
}
