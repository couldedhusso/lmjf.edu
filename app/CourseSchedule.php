
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CourseSchedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'CourseID', 'TimePeriodID', 'ClassRoomID'
    ];

    public function classroom()
    {
      return $this->belongsTo('App\ClassRoom');
    }

    public function time_period()
    {
      return $this->belongsTo('App\Time_Period');
    }

    public function course()
    {
      return $this->belongsTo('App\Course');
    }


}
