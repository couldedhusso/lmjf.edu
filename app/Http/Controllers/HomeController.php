<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
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
        $dbData = $this->InitDataSession();
        return view('/home', [
                     'aYear' => $dbData['aYear']
                    ,'semestre' => $dbData['semestre']
                    ,'evaluations' => $dbData['evaluations']
                    ,'classrooms' => $dbData['classrooms']
                    ,'studentByteacher' => $dbData['studentByteacher']
                    ,'currentAcademiqueYearStudent' => $dbData['currentAcademiqueYearStudent']
                    ,'allTeacher'  =>  $dbData['allTeacher']
                    ,'allTeacher'  =>  $dbData['allTeacher']
                    ,'profdisciplines'  =>  $dbData['profdisciplines']
        ]);
    }

    public function search_engine(Request $request)
    {
       $table = Input::get('search-key');
       $teacherList = $this->getTeacher();
       $teacherListByCourses = $this->getTeacherByCourses();
       $getCourses = $this->getAllCourses();
       $classroomList = $this->getAllClassroom();
       $getAcademicYear  = $this->getAcademicYear();

       $results_search = collect([]);


       // $search_key = 'wer';

       return view('Administration.search', [
           'table' => $table,
           'teacherList' => $teacherList,
           'teacherListByCourses' => $teacherListByCourses,
           'getCourses' => $getCourses,
           'classroomList' => $classroomList,
           'getAcademicYear' => $getAcademicYear,
           'results_search'=> $results_search

       ]);
    }

    public function search_results(Request $request)
    {

      $teacherList = $this->getTeacher();
      $teacherListByCourses = $this->getTeacherByCourses();
      $getCourses = $this->getAllCourses();
      $classroomList = $this->getAllClassroom();
      $getAcademicYear  = $this->getAcademicYear();


       $table = Input::get('search-key');
       $qd = Input::get('search');

       // dd($qd = Input::all());

       if ($table == 'Teacher') {
         $results_search = $this->getTeacherData($qd);

       }else {

          $results_search = $this->getStudentData($qd);
       }

       return view('Administration.search', [
                              'table' => $table,
                              'teacherList' => $teacherList,
                              'teacherListByCourses' => $teacherListByCourses,
                              'getCourses' => $getCourses,
                              'classroomList' => $classroomList,
                              'getAcademicYear' => $getAcademicYear,
                              'results_search'=> $results_search ]);
    }

    private  function getTeacherData($params){

        // $teacherCollection = $this->getTeacher();
        $searchedTeacher = [];

        if ($params['search-by'] == 'nom_prenom') {

            $xvalue = explode(" ",$params['teacher']);
            $searchedTeacher = DB::table('Course')
                      ->join('Teacher', 'Course.courseID', '=','Teacher.courseID')
                      ->join('users', 'users.id', '=','Teacher.idTeacher')
                      ->where('users.userFirstName', $xvalue[0])
                      ->where('users.userLastName', $xvalue[1])
                      ->select('users.id','users.userFirstName', 'users.userLastName',
                                'users.userContact', 'Course.courseName')
                      ->get();
        } else {
              $searchedTeacher = DB::table('Course')
                    ->join('Teacher', 'Course.courseID', '=','Teacher.courseID')
                    ->join('users', 'users.id', '=','Teacher.idTeacher')
                    ->where('Course.courseID', $params['classroom'] )
                    ->select('users.id', 'users.userFirstName', 'users.userLastName',
                              'users.userContact', 'Course.courseName')
                    ->get();
        }

        return $searchedTeacher;

      }


      private  function getStudentData($params){

            // $teacherCollection = $this->getTeacher();
            $foundStudent = [];

          //  dd($params);

            if ($params['search-by'] == 'matricule') {

                $foundStudent  = DB::table('Classroom')
                                    // ->join('Enrollment', 'Classroom.classRoomID', '='
                                    //                 ,'Enrollment.classRoomID')
                                    ->join('Student', 'Classroom.classRoomID', '='
                                                    ,'Student.classRoomID')
                                    ->where('Student.studentMatricule',  $params['studentMatricule'])
                                    // ->where('Enrollment.academicYear',  $params['academicYear'])
                                    ->select('Student.*', 'Classroom.ClassRoomName')
                                    ->distinct()->get();
            } else {
                  $foundStudent = DB::table('Classroom')
                                      // ->join('Enrollment', 'Classroom.classRoomID', '='
                                      //                 ,'Enrollment.classRoomID')
                                      ->join('Student', 'Classroom.classRoomID', '='
                                                      ,'Student.classRoomID')
                                      ->where('Student.classRoomID',  $params['classroom'])
                                      // ->where('Enrollment.academicYear',  $params['academicYear'])
                                      ->select('Student.*', 'Classroom.ClassRoomName')
                                      ->distinct()->get();
            }

        return $foundStudent;

    }

    private function getTeacher(){

        return  DB::table('Course')
                    ->join('Teacher', 'Course.courseID', '='
                    ,'Teacher.courseID')
                    ->join('users', 'users.id', '='
                    ,'Teacher.idTeacher')
                    ->select('users.*', 'Course.courseName')
                    ->get();
    }

    private function getTeacherByCourses(){
      return  DB::table('Course')
                  ->join('Teacher', 'Course.courseID', '='
                  ,'Teacher.courseID')
                  ->join('users', 'users.id', '='
                  ,'Teacher.idTeacher')
                  ->select('users.*', 'Course.courseName')
                  ->distinct()->get();
    }

    private function cleanDataQuery($user_query){
      $q = [];
      foreach ($user_query as $key => $value) {
          if (!empty($value)) $q = [$key => $value];
      }
      return $q;
    }

    private function getAllCourses(){
      return DB::table('Course')->select('Course.*')->get();
    }

    private function getAllClassroom(){
      return DB::table('Classroom')->select('Classroom.*')->get();
    }

    private function getAcademicYear(){

      return DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                     ->select('academicYear')->first();
    }

    public function delete_teacher(Request $request){
        $deleTeacher = User::find(Input::get('teacher_id'));
        $deleTeacher->delete();
        $this->index();
    }

    public function delete_student(Request $request){
        $deleStudent = Student::find(Input::get('studentMatricule'));
        $deleStudent->delete();
        $this->index();
    }

    public function get_teacher_by_id(Request $request){
        // Teacher relation
          // - user -> ok
          // - profile-photo
          // - teacher -> ok
          // - classroom -> ok
          // - prof principal -> ok
          // - discipline -> ok

          // l admin doit entrer les donnees a modifier
      $id = Input::get('teacher_id');

      $user = DB::table('users')->where('id', $id)->first();
      $course_child = DB::table('Course')
                          ->join('CourseChild', 'Course.CourseID', '=',
                          'Course.CourseID')
                          ->join('Teacher', 'Course.CourseID', '=',
                          'Teacher.CourseID')
                          ->where('Teacher.idTeacher', $id)
                          ->select('CourseChild.*', 'Course.CourseID',
                                   'Course.courseName')->get();

      $classroom = DB::table('Classroom')->join('Teacher', 'Classroom.classRoomID'
                      ,'=', 'Teacher.classRoomID')->where('Teacher.idTeacher', $id)
                      ->select('Classroom.classRoomID','Classroom.ClassRoomName')
                      ->get();

      $prof_pricinpal = DB::table('Classroom')->join('ProfPrincipal', 'Classroom.classRoomID'
                     ,'=', 'ProfPrincipal.classRoomID')->where('ProfPrincipal.idTeacher', $id)
                     ->select('Classroom.classRoomID','Classroom.ClassRoomName')
                     ->get();


      return view('Administration.get_teacher_by_id', [
          'user'=>$user
          ,'course_child' =>$course_child
          ,'classroom' => $classroom
          ,'prof_pricinpal' => $prof_pricinpal
      ]);

    }

    public function update_student_by_id(Request $request){
        $id = Input::get('studentMatricule');
    }












    private function InitDataSession(){

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
                     ->join('Teacher', 'Classroom.classRoomID', '=','Teacher.classRoomID')
                     ->where('Teacher.idTeacher', '=', $idTeacher)
                     ->select('Classroom.ClassRoomName', 'Classroom.classRoomID')
                     ->distinct()->get();

      $studentByteacher = DB::table('Classroom')
                          ->join('Teacher', 'Classroom.classRoomID', '=','Teacher.classRoomID')
                          ->join('Student', 'Classroom.classRoomID', '=','Student.classRoomID')
                          ->where('Teacher.idTeacher', '=', $idTeacher)
                          ->select('Student.*')
                          ->distinct()->get();

       $currentAcademiqueYearStudent = DB::table('Student')->where('academicYear',
                                                  $aYear->academicYear)->get();


       $allTeacher = DB::table('Course')
                            ->join('Teacher', 'Course.courseID', '='
                            ,'Teacher.courseID')
                            ->join('users', 'users.id', '='
                            ,'Teacher.idTeacher')
                            ->select('users.*', 'Course.courseName')
                            ->distinct()->get();

      $profdisciplines = DB::table('Course')
                            ->join('CourseChild', 'Course.courseID', '=','CourseChild.courseID')
                            ->join('Teacher', 'Course.courseID', '=','Teacher.courseID')
                            ->where('Teacher.idTeacher', '=', $idTeacher)
                            ->select('CourseChild.labelCourse', 'CourseChild.CourseChildID')
                            ->distinct()->get();

      $evaluations = DB::table('courseTest')
                          ->where('courseTest.teacherID', '=', $idTeacher)
                          ->where('courseTest.semestreID', '=', $semestre->semestreID)
                          ->get();


     $db = [
            'aYear'  => $aYear
            ,'semestre'  => $semestre
            ,'evaluations'  => $evaluations
            ,'classrooms'  => $classrooms
            ,'studentByteacher'  => $studentByteacher
            ,'currentAcademiqueYearStudent'  => $currentAcademiqueYearStudent
            ,'allTeacher'  => $allTeacher
            ,'profdisciplines'  => $profdisciplines
            ,'evaluations'  => $evaluations
       ];

       return $db;

    }








}
