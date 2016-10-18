<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use DB;
use App\Enseingnant;
use App\CoursTest;
use App\CourseGrade;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EvaluationsController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {


      $reqData = Input::except('ClassRoomID');
      $reqDataClassroom  = Input::get('ClassRoomID');

      $courseTest = array(
          'teacherID' => Auth::user()->id
          ,'testName'  => $reqData['testDescription']
          ,'testDescription'  => $reqData['testDescription']
          ,'maxGradevalue'  => $reqData['maxGradevalue']
          ,'CourseChildID'  => $reqData['CourseChildID']
          ,'semestreID'  => $reqData['semestre']
      );

      // dd($reqDataClassroom);

      // // add teacher to db
      $newTest = CoursTest::create($courseTest);

      // mettre à jour la table teacher
      foreach ($reqDataClassroom as  $value) {

        //  dd($reqDataClassroom[$key]);
          DB::table('courseTest')
              ->where('CoursetestID', $newTest->id)
              ->update(['classRoomID' => $value]);
      }

      return redirect('/home');

  }

  public function saisie_des_notes(Request $request) {

      $reqData = Input::except('_token', 'name');


      $studentByclassroom = DB::table('Classroom')
                          ->join('Student', 'Classroom.classRoomID', '='
                          ,'Student.classRoomID')
                          ->where('Classroom.classRoomID', $reqData['classRoomID'])
                          ->select('Student.*','Classroom.ClassRoomName', 'Classroom.classRoomID')
                          ->get();


      for ($i=0; $i < $studentByclassroom->count() ; $i++) {

          $studMatricule = $studentByclassroom[$i]->studentMatricule;
          $grades = CourseGrade::create([
            'studentMatricule' => $studMatricule
            ,'semestreID' => $reqData['semestre']
            ,'TestID' => $reqData['testID']
            ,'Grade' => $reqData[$studMatricule] // note obtenu par l eleve xxx
            ,'Appreciation' => '-'

         ]);
      }

      return redirect('/home');

  }


}
