<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class ApiController extends Controller
{
    public function getAllStudents()
     {
       $students = Student::get()->toJson(JSON_PRETTY_PRINT);
       return response($students,200);
     }
     public function createStudent(Request $req)
     {
        $student = new Student;
        $student->name = $req->name;
        $student->course = $req->course;
        $student->save();
        return response()->json([
            "message"=>"Student created successfully"
        ],201);
     }
     public function getStudent($id)
     {
         if(Student::where('id',$id)->exists()){
             $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
             return response($student, 200);
         } else {
             return response()->json([
                 'message'=>'NOT Found'
             ]);
         }
       // $student = Student::find($id)->toJs;
     }
     public function updateStudent(Request $req, $id)
     {
       if(Student::where('id',$id)->exists()){
          $student = Student::find($id);
          $student->name= is_null($req->name) ? $student->name: $req->name;
          $student->course= is_null($req->course) ? $student->course: $req->course;
          $student ->save();
          return response()->json([
              'message' => 'Student is updated'
          ], 200); 
       } else {
           return response()->json([
               'message'=>'Student t found',
           ], 404);
       }
     }
     public function deleteStudent($id)
     {
       if(Student::where('id',$id)->exists()) {
         $student = Student::find($id);
         $student->delete();
         return response()->json([
           "message"=> "Student is deleted"], 200);
       } else {
              return response()->json(["message" => "Student id inot found"],404);
       }
     }

}
