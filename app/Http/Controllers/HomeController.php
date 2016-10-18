<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $idTeacher = Auth::user()->id;

      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                     ->select('academicYear')->first();


      $semestre = DB::table('Semestre')->where('academicYear', '=',$aYear->academicYear)
                     ->where('semestreDescription', '=', '1er trimestre')
                     ->first();


     $evaluations = DB::table('courseTest')
                         ->where('courseTest.teacherID', '=', $idTeacher)
                         ->where('courseTest.semestreID', '=', $semestre->semestreID)
                         ->get();

     $classrooms = DB::table('Classroom')
                     ->join('Teacher', 'Classroom.classRoomID', '='
                             ,'Teacher.classRoomID')
                     ->where('Teacher.idTeacher', '=', $idTeacher)
                     ->select('Classroom.ClassRoomName', 'Classroom.classRoomID')
                     ->distinct()->get();

      $studentByteacher = DB::table('Classroom')
                          ->join('Teacher', 'Classroom.classRoomID', '='
                                  ,'Teacher.classRoomID')
                          ->join('Student', 'Classroom.classRoomID', '='
                                          ,'Student.classRoomID')
                          ->where('Teacher.idTeacher', '=', $idTeacher)
                          ->select('Student.*')
                          ->distinct()->get();

        $currentAcademiqueYearStudent = DB::table('Student')->where('academicYear',
                                                  $aYear->academicYear)->get();

        $allTeacher = DB::select('select * from Teacher');

        $allTeacher = DB::table('Course')
                            ->join('Teacher', 'Course.courseID', '='
                            ,'Teacher.courseID')
                            ->join('users', 'users.id', '='
                            ,'Teacher.idTeacher')
                            ->where('Teacher.idTeacher', '=', $idTeacher)
                            ->select('users.*', 'Course.courseName')
                            ->distinct()->get();

        $profdisciplines = DB::table('Course')
                            ->join('CourseChild', 'Course.courseID', '='
                            ,'CourseChild.courseID')
                            ->join('Teacher', 'Course.courseID', '='
                            ,'Teacher.courseID')
                            ->where('Teacher.idTeacher', '=', $idTeacher)
                            ->select('CourseChild.labelCourse', 'CourseChild.CourseChildID')
                            ->distinct()->get();

        $evaluations = DB::table('courseTest')
                          ->where('courseTest.teacherID', '=', $idTeacher)
                          ->where('courseTest.semestreID', '=', $semestre->semestreID)
                          ->get();

        return view('/home',compact('aYear', 'semestre', 'evaluations', 'classrooms',
                                    'studentByteacher', 'currentAcademiqueYearStudent',
                                    'allTeacher', 'evaluations', 'profdisciplines') );
    }
}
