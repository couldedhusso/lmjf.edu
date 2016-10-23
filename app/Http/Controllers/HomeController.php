<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Auth;
use DB;
use App\CourseTest;
use App\Teacher;
use App\ProfPrincipal;

// TODO : mettre la table à jour
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

    public function gradeStudent(Request $request){
      // $idTeacher = Auth::Teacher()->id;
      $q = Input::get('note');
      $idTeacher = $q['teacher_id'];

      $courseTest = array(
          'teacherID' => $idTeacher
          ,'testName'  => $q['testDescription']
          ,'testDescription'  => '-'
          ,'maxGradevalue'  => $q['valmaxi']
          ,'CourseChildID'  => $q['CourseChild']
          ,'semestreID'  => $q['periode']
          ,'classRoomID'  => $q['classroom']
      );

      // dd($reqDataClassroom);

      // // add teacher to db
      $courseTest = CourseTest::create($courseTest);
      // $newTest =  $newTest->CoursetestID -- why it doesnt work

      $courseTest = DB::table('courseTest')->orderBy('created_at', 'desc')
                              ->select('CoursetestID')
                              ->first();

      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();

      $teacher = DB::table('Teacher')->join('users', 'users.id', '=', 'Teacher.idTeacher')
                ->where('Teacher.idTeacher', $idTeacher)
                ->select('users.*')
                ->first();


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
                          $keyCollection = [];
                          foreach ($classrooms as  $value) {
                              array_push($keyCollection, $value->classRoomID);

                          }

    // $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
    //                                               ->select('academicYear')
    //                                               ->first();
    //
    //
    //
    // $semestre = DB::table('Semestre')->where('academicYear', '=', $aYear->academicYear)
    //                                             ->where('semestreDescription', '=', '1er trimestre')
    //                                             ->first();

    $studentByclassroom = DB::table('Classroom')
                                                  ->join('Student', 'Classroom.classRoomID', '='
                                                  ,'Student.classRoomID')
                                                  ->whereIn('Student.classRoomID', $keyCollection)
                                                  ->select('Student.*','Classroom.ClassRoomName', 'Classroom.classRoomID')
                                                  ->get();

      // $studentByclassroom = DB::table('Classroom')
      //                       ->join('Student', 'Classroom.classRoomID', '='
      //                       ,'Student.classRoomID')
      //                       ->where('Classroom.idTeacher', '=', $idTeacher)
      //                       ->select('Classroom.ClassRoomName', 'Classroom.classRoomID')
      //                       ->get();



      return view('Profs.notes', compact('evaluations', 'classrooms',
                                          'semestre',
                                          'studentByclassroom',
                                          'teacher',
                                          'courseTest'
     ));
    }

    public function saisie_note(){

      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();



      $semestre = DB::table('Semestre')->where('academicYear', '=', $aYear->academicYear)
                            ->where('semestreDescription', '=', '1er trimestre')
                            ->first();



      $listStudent = DB::table('Student')
                        ->join('Classroom', 'Classroom.classRoomID', '='
                        ,'Student.classRoomID')
                        // ->join('Enrollment', 'Classroom.classRoomID', '='
                        // ,'Enrollment.classRoomID')
                        // ->where('Enrollment.academicYear', $aYear->academicYear)
                        ->select('Student.*')->get();

      $listTeacher = DB::table('Teacher')->join('users', 'users.id', '='
                              ,'Teacher.idTeacher')->select('users.*', 'Teacher.classRoomID')
                              ->get();


      $listcourse = DB::table('Course')->join('CourseChild', 'Course.courseID', '='
                              ,'CourseChild.courseID')->select('CourseChild.*', 'Course.*')
                              ->get();


      $classroomsBy = DB::table('Classroom')
                          ->join('Student', 'Classroom.classRoomID', '='
                          ,'Student.classRoomID')
                          ->join('Teacher', 'Classroom.classRoomID', '='
                          ,'Teacher.classRoomID')
                          ->join('Course', 'Course.courseID', '='
                          ,'Teacher.courseID')
                          ->join('CourseChild', 'Course.courseID', '='
                          ,'CourseChild.courseID')
                          ->select('Student.*','CourseChild.*',
                          'Classroom.classRoomID', 'Teacher.*')
                          ->get();

      $studentByclassroom = DB::table('Classroom')
                            ->join('Student', 'Classroom.classRoomID', '='
                            ,'Student.classRoomID')
                            ->select('Student.*','Classroom.ClassRoomName', 'Classroom.classRoomID')
                            ->get();

        $keyCollection = [];
        foreach ($studentByclassroom as  $value) {
              array_push($keyCollection, $value->classRoomID);
         }

         $classrooms = DB::table('Classroom')
                       ->whereIn('Classroom.classRoomID', $keyCollection)
                       ->select('Classroom.classRoomID', 'Classroom.ClassRoomName')
                       ->get();

                            // dd($classrooms);

        return view('Administration.saisie_notes',  [
              'classrooms' => $classrooms,
              'semestre' => $semestre,
              'listStudent' => $listStudent,
              'listTeacher' => $listTeacher,
              'listcourse' => $listcourse
        ]);
    }

    public function get_teacher_by_id($id){
        // Teacher relation
          // - user -> ok
          // - profile-photo
          // - teacher -> ok
          // - classroom -> ok
          // - prof principal -> ok
          // - discipline -> ok

          // l admin doit entrer les donnees a modifier
      // $id = Input::get('teacher_id');
      // $id = Input::all();

      $user = DB::table('users')->where('id', $id)->first();

      $courses= DB::table('Course')->select('Course.courseID',
                                  'Course.courseName')->get();

      $teacher_courses= DB::table('Course')
                          ->join('Teacher', 'Course.CourseID', '=',
                          'Teacher.CourseID')
                          // ->join('CourseChild', 'Course.CourseID', '=',
                          // 'CourseChild.CourseID')
                          ->where('Teacher.idTeacher', $id)
                          ->select('Course.courseID', 'Course.courseName')->get();


      $teacher_classroom = DB::table('Classroom')->join('Teacher', 'Classroom.classRoomID'
                      ,'=', 'Teacher.classRoomID')->where('Teacher.idTeacher', $id)
                      ->select('Classroom.classRoomID','Classroom.ClassRoomName')
                      ->get();

      $classrooms = DB::table('Classroom')->select('Classroom.classRoomID'
                                    ,'Classroom.ClassRoomName')->get();



      $prof_pricinpal = DB::table('Classroom')->join('ProfPrincipal', 'Classroom.classRoomID'
                     ,'=', 'ProfPrincipal.classRoomID')->where('ProfPrincipal.idTeacher', $id)
                     ->select('Classroom.classRoomID',
                     'Classroom.ClassRoomName',
                     'ProfPrincipal.idTeacher')->get();

      $isProfprinc = false;
      if ($prof_pricinpal->count() >= 1) {
          $isProfprinc = true;
      }


      return view('Administration.get_teacher_by_id', [
          'user' => $user
          ,'teacher_classroom' => $teacher_classroom
          ,'teacher_courses'  => $teacher_courses
          ,'courses' => $courses
          ,'classrooms' => $classrooms
          ,'prof_pricinpal' => $prof_pricinpal
          ,'isProfprinc' => $isProfprinc
      ]);

    }

    public function update_student_by_id(Request $request){

      // Student relation
        // - classe ->
        // - profile-photo
        // - enrollment ->
        // - coursetest ->
        // - courseGrade ->
        // - semestre ->
        // - academiqueYear ->
        $id = Input::get('studentMatricule');
    }



    public function teacherUpdate(Request $request){

      $user = Input::get('users');
      $userupdate = DB::table('users')->where('id', $user['id'])
                        ->update($user);

      $teacher = DB::table('Teacher')->where('idTeacher', $user['id'])
                                     ->first();

      $deleteclassroom  = Input::get('deletecassroom');
      $addclassroom  = Input::get('addclassroom');
      $deleteclassroompp = Input::get('deleteclassroompp');
      $addclassroompp = Input::get('addclassroompp');
      $classroomidpp = Input::get('classroomidpp');

      // s il y a des classes à ajouter ou à supprimer
      if (count($addclassroom) >= 1) {
        foreach ($addclassroom as $key => $value) {
           $add[] = Teacher::create([
             'classRoomID' => $value
            ,'idTeacher' => $teacher->idTeacher
            ,'CourseID' => $teacher->courseID
          ]);
        }
      }
      elseif (count($deleteclassroom)>=1) {
          foreach ($deleteclassroom as $key => $value) {
            $delTeacherClassroom = DB::table('Teacher')->where('idTeacher', $user['id'])
                                           ->where('classRoomID', $value)
                                           ->delete();
       }
    }

    // s il y a des classes à ajouter ou à supprimer à la table prof_pricinpal
    if (count($addclassroompp) >= 1) {
      foreach ($addclassroompp as $key => $value) {
         $add[] = ProfPrincipal::create([
           'classRoomID' => $value
          ,'idTeacher' => $teacher->idTeacher
        ]);
      }
    } elseif (count($classroomidpp) >= 1) {
        foreach ($classroomidpp as $key => $value) {
           $add[] = ProfPrincipal::create([
             'classRoomID' => $value
            ,'idTeacher' => $teacher->idTeacher
          ]);
        }
    }

    elseif (count($deleteclassroompp)>=1) {
        foreach ($deleteclassroompp as $key => $value) {
          $delPpClassroom = DB::table('ProfPrincipal')->where('idTeacher', $user['id'])
                                         ->where('classRoomID', $value)
                                         ->delete();


     }
  }



   return $this->index();

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
