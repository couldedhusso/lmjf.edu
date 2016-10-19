
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Enrollement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'classRoomID','DateEnrollement', 'StudentID', 'academicYear'
    ];

    public function student()
    {
      return $this->belongsTo('App\Student');
    }

    public function classroom()
    {
      return $this->belongsTo('App\ClassRoom');
    }



}
