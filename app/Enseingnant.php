<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseingnant extends Model
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
      return $this->belongsTo('App\Course');
    }

    public function classroom()
    {
      return $this->belongsTo("App\ClassRoom");
    }
}
