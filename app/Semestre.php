<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Semestre extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Semestre';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'semestreDescription', 'StartDate', 'endDate','academicYear', 'semestreID'
    ];

    public function anneescolaire()
    {
        return $this->belongsTo('App\AnneeScolaire');
    }

    // public function gradecalculation()
    // {
    //     return $this->hasMany('App\GradeCalculation');
    // }
    //
    // public function studentlevl()
    // {
    //     return $this->hasOne('App\StudentLevel');
    // }

    // today
    public function coursetest()
    {
      return $this->hasMany('App\CourseTest');
    }

    public function averagegrade()
    {
      return $this->hasMany('App\AverageGrade');
    }


}
