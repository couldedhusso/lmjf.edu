<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


// POUR LES PARENTS D ELEVES

class Student extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
       'studentMatricule', 'studentParentID', 'responsableStudent', 'contactresponsableStudent','classRoomID', 'studentName',
       'studentLastName','studentBirthdate', 'studentSexe', 'studentBirthPlace',
       'studentRegime', 'studentInterne', 'studentAffecte','studentRedoublant'
    ];


    // public function parent()
    // {
    //    return $this->belongsTo("App\Parent");
    // }
    //
    // // public function registrationstudent()
    // // {
    // //    return $this->hasOne("App\RegistrationStudent");
    // // }
    // public function gradeCalculation()
    // {
    //   return $this->hasMany("App\GradeCalculation");
    // }
    // //
    // // public function studentlevl()
    // // {
    // //     return $this->hasOne('App\StudentLevel');
    // // }
    //
    // public function averagegrade()
    // {
    //   return $this->hasMany('App\AverageGrade');
    // }
    //
    // public function absence()
    // {
    //   return $this->hasMany('App\Absence');
    // }
    //
    //
    // //today
    // public function coursegrade()
    // {
    //   return $this->hasMany('App\CourseGrade');
    // }
    //
    // public function classroom()
    // {
    //   return $this->belongsTo('App\ClassRoom');
    // }
    //
    // public function parents()
    // {
    //    return $this->belongsTo("App\User");
    // }




}
