<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Course';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CourseName', 'CourseDescription', 'CourseCoeff', 'cycleID'
    ];

    public function coursechild()
    {
      return $this->hasMany('App\CourseChild');
    }


    public function averagegrade()
    {
      return $this->hasOne('App\AverageGrade');
    }

    public function courseschedule()
    {
      return $this->hasOne('App\CourseSchedule');
    }



// ==== today
    public function cycle()
    {
      return $this->belongTo('App\Cycle');
    }

    public function coursechild()
    {
      return $this->hasMany('App\Course');
    }

    public function teacher()
    {
      return $this->hasMany('App\Teacher');
    }





}
