<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Student;
use App\Teacher;
use App\Enrollment;
use App\Parents;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{

    // TODO : le revoir la logique de compte pr les parents d eleve
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $aYear = DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                         ->select('academicYear')->first();

        //$avatar = Input::get()
        $reqdata = Input::get('studentDatas');
        $studresp =  Input::get('studentRespoDatas');

      //  dd($reqdata['anneeScolaire']);

        $dParents =[
            'parentFistName' => $studresp['nom']
            ,'parentLastName'  => $studresp['prenom']
            ,'parentTelephone'  => $studresp['contact']
            ,'parentPassword' => ('lmjfb')
        ];

        // create parent student
        $studentparent = Parents::create($dParents);

        $studEnrol = DB::table('Enrollment')->where('classRoomID',
                              $reqdata['classroom'])->count();

        if ($studEnrol == 0) {
            $newStudent = Enrollment::create([
                'academicYear' => $aYear->academicYear,
                'classRoomID'  => $reqdata['classroom']
            ]);

       }

      //  $studentparent = Parent::create([$studresp]);

        // save student in db
        $stud = [
            'studentMatricule' => $reqdata['matricule']
            ,'classRoomID' => $reqdata['classroom']
            ,'studentName' => $reqdata['nom']
            ,'studentLastName' => $reqdata['prenoms']
            ,'studentBirthdate' => $reqdata['birthdate']
            ,'studentSexe' => $reqdata['sexe']
            ,'studentBirthPlace' => $reqdata['birthplace']
            ,'studentRegime' => $reqdata['regime']
            ,'studentInterne' => $reqdata['interne']
            ,'studentAffecte' => $reqdata['affecte']
            ,'studentRedoublant' => $reqdata['doublant']
            ,'responsableStudent' => $studresp['nom'].' '.$studresp['prenom']
            ,'contactresponsableStudent' => $studresp['contact']
            ,'academicYear' => $reqdata['anneeScolaire']
            ,'studentParentID' => $studentparent->id
        ];

        $newStudent = Student::create($stud);


        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
