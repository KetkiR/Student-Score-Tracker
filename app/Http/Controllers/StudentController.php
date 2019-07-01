<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    /**
     * function to update/save score details for a student
     */

    public function updateScore(Request $request) {
        $student = new \App\Student();
        $student->date = $request->get('date') ? $request->get('date') : date("Y/m/d");
        $student->score = $request->get('score');
        $student->name = $request->get('name');
        if(!($student->score && $student->name)) { // if name and score data does not exists
            return response()->json(['message'=>'Please provide complete information'],200);
        }else {
            try {
                \DB::collection('student')->where('name', $student->name)->where('date', $student->date)
                       ->update(array('name' => $student->name, 'score' => $student->score, 'date' => $student->date), ['upsert' => true]);
                return response()->json(['message'=>'data saved successfully'],200);
                } catch(Exception $error) {
                throw $error;
            }
        }
        
    }
    /**
     * function to get student record
     */

    public function getStudentRecord(Request $request) {
        try{
            if($request->get('name')){ /// check if name field exists
                $studentRecords = \DB::collection('student')->where('name',$request->get('name'))->get();
                return response()->json(['studentDetails'=> $studentRecords],200);
            } else {
                return response()->json(['message'=>'Please provide student name'],200);
            }
        }catch( Exception $exception){
            throw $error;
        }
    }

    /**
     * function to get distinct student list and also one student record details 
     */

    public function getStudentsList(Request $request) {
        try{
            $studentCollection = \DB::collection('student');
            $studentList = $studentCollection->distinct()->get(['name']);
            $studentCount = $studentCollection->count();
            if($studentCount) { // check if data exists
                $firstStudentName = $studentCollection->take(1)->get(); // take the first student from mongo and get its details
                $firstStudentRecord = \DB::collection('student')->where('name', $firstStudentName[0])->get();
                return response()->json(['studentList'=> $studentList, 'firstStudent' => $firstStudentRecord],200);
            } else {
                return response()->json(['message'=>'No students score added yet. Please go to enter score option to enter students score'],400);
            }
        }catch(Exception $error) {
            throw $error;
        }

    }
}
