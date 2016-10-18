<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// use Auth;
use Illuminate\Support\Facades\DB;
use App\Semestre;
use App\Roles;
use App\Enseingnant;

Route::group(['middleware' => 'auth'], function () {

  ////=========== espace prof.

  Route::get('mes-evaluations', function () {

        $idTeacher = Auth::user()->id;

        $profdisciplines = DB::table('Course')
                            ->join('CourseChild', 'Course.courseID', '='
                            ,'CourseChild.courseID')
                            ->join('Teacher', 'Course.courseID', '='
                            ,'Teacher.courseID')
                            ->where('Teacher.idTeacher', '=', $idTeacher)
                            ->select('CourseChild.labelCourse', 'CourseChild.CourseChildID')
                            ->distinct()->get();

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

        return view('Profs.evaluations', compact('profdisciplines', 'evaluations', 'classrooms', 'semestre'));
  });

  Route::get('notes-des-evalautions', function () {

      $idTeacher = Auth::user()->id;

      // $aYear = AnneeScolaire::orderBy('academicYear', 'desc')
      //                         ->select('academicYear')
      //                         ->first();

      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
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



      return view('Profs.notes', compact('evaluations', 'classrooms', 'semestre', 'studentByclassroom'));
  });

  Route::get('saisie-des-notes', function () {

    //  $classrooms = DB::select('select * from Classroom');

      // $idTeacher = Auth::Teacher()->id;
      $idTeacher = Auth::user()->id;


      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();



      $semestre = DB::table('Semestre')->where('academicYear', '=', $aYear->academicYear)
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
                          ->get();


      $studentByclassroom = DB::table('Classroom')
                            ->join('Student', 'Classroom.classRoomID', '='
                            ,'Student.classRoomID')
                            ->join('Teacher', 'Classroom.classRoomID', '='
                            ,'Teacher.classRoomID')
                            ->where('Teacher.idTeacher', '=', $idTeacher)
                            ->select('Student.*','Classroom.ClassRoomName', 'Classroom.classRoomID')
                            ->get();

      return view('Profs.saisie_des_notes', compact('classrooms', 'evaluations', 'studentByclassroom'));
  });

  Route::get('liste-de-presence', function () {
      $idTeacher = Auth::user()->id;

      $classrooms = DB::table('Classroom')
                          ->join('Teacher', 'Classroom.classRoomID', '='
                          ,'Teacher.classRoomID')
                          ->where('Teacher.idTeacher', '=', $idTeacher)
                          ->select('Classroom.ClassRoomName', 'Classroom.classRoomID')
                          ->get();

      $keyCollection = [];
      foreach ($classrooms as  $value) {
          array_push($keyCollection, $value->classRoomID);

      }

      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();



      $semestre = DB::table('Semestre')->where('academicYear', '=', $aYear->academicYear)
                            ->where('semestreDescription', '=', '1er trimestre')
                            ->first();

      $studentByclassroom = DB::table('Classroom')
                              ->join('Student', 'Classroom.classRoomID', '='
                              ,'Student.classRoomID')
                              ->whereIn('Student.classRoomID', $keyCollection)
                              ->select('Student.*','Classroom.ClassRoomName', 'Classroom.classRoomID')
                              ->get();

      return view('Profs.absences',  compact('classrooms', 'studentByclassroom', 'semestre'));
  });

  ////=========== fin espace prof .


  ////=========== espace Admin.
  /// url de l espace Admin
  Route::get('gestion-des-professeurs', function () {

    $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                            ->select('academicYear')
                            ->first();

      return view('Admin.user-account',  compact('aYear'));
  });

  /// url de l espace Admin

  Route::get('ajouter-un-professeur', function () {
      $classrooms = DB::select('select * from Classroom');
      $courses = DB::select('select * from Course');

      return view('Admin.add-teacher', compact('classrooms', 'courses'));
  });

  Route::get('gestion-des-eleves', function () {

    $aYear = AnneeScolaire::orderBy('academicYear', 'desc')
                            ->select('academicYear')
                            ->first();


    $studentsCollection = DB::table('Student')
                                ->join('Classroom', 'Student.classRoomID', '='
                                ,'Classroom.classRoomID')
                                ->select('Student.*', 'Classroom.ClassRoomName')
                                ->get();


      return view('Admin.list-students', compact('aYear'));
      // return view('Admin.student-registration', compact('studentsCollection'));
  });


  Route::get('ajouter-un-eleve', function () {
      $idTeacher = Auth::user()->id;



      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();



      $semestre = DB::table('Semestre')->where('academicYear', '=', $aYear->academicYear)
                            ->where('semestreDescription', '=', '1er trimestre')
                            ->first();
      $classrooms = DB::select('select * from Classroom');

      return view('Admin.student-registration', compact('classrooms', 'aYear'));
      // return view('Admin.student-registration', compact('studentsCollection'));
  });

  // mes post
  Route::post('addTeacher', 'TeacherController@create');
  Route::post('studReg', 'StudentController@store');
  Route::post('newEvaluation', 'EvaluationsController@store');
  Route::post('gradeEvaluation', 'EvaluationsController@saisie_des_notes');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index');

///url for dummies datas

// Route::get('dumiesStudents', function(){
//
//       // it_creates_at_least_hundred_fake_users
//
//       // $users = factory(App\User::class, mt_rand(100, 1000))->create();
//       // $user_count = count($users) >= 100;
//
//     $students = [];
//     $faker = Faker\Factory::create();
//
//     for ($i = 0; $i <  5; $i++) {
//         // $students[] = App\Student::create([
//         //     'studentMatricule' => $faker->randomNumber($nbDigits = 4),
//         //     'studentParentID' => $faker->randomDigit,
//         //     'responsableStudent' => $faker->name,
//         //     'contactresponsableStudent' => $faker->phoneNumber,
//         //     'classRoomID' => 8,
//         //     'studentName' => $faker->name,
//         //     'studentLastName' => $faker->firstNameFemale,
//         //     'studentBirthdate' =>$faker->date($format = 'Y-m-d', $max = 'now'),
//         //     'studentSexe' => 'F',
//         //     'studentBirthPlace' => $faker->city,
//         //     'studentRegime' => '-',
//         //     'studentInterne' => '-',
//         //     'studentAffecte' => 'OUI',
//         //     'studentRedoublant' => '0'
//         // ]);
//
//
//         $teacher[] = App\Teacher::create([
//             'ClassRoomName' => Auth::user()->id,
//             'CourseID' => 1,
//             'classRoomID' => $faker->randomDigit
//         ]);
//
//       }
//
//       // $teacher[] = App\Teacher::create([
//       //     'idTeacher' => Auth::user()->id,
//       //     'CourseID' => 1,
//       //     'classRoomID' => 8
//       // ]);
//
//
// });
