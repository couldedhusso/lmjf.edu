<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseChild extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CourseChild';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'semestreID', 'teacherID', 'teacherID', 'CourseChildID', 'testDescription', 'maxGradevalue'
    ];


// ==== today

    public function course()
    {
      return $this->belongsTo('App\Teacher');
    }

    public function coursetest()
    {
      return $this->hasMany('App\CourseTest');
    }

}
