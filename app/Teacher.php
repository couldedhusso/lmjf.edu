<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Teacher';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'idTeacher', 'CourseID', 'classRoomID', 'pp'
    ];

    public function course()
    {
      return  $this->belongsTo("App\Course");
    }

    public function classroom()
    {
      return  $this->belongsTo("App\ClassRoom");
    }

    // today

    public function coursetest()
    {
      return $this->hasMany('App\CourseTest');
    }


}
