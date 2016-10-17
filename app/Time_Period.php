
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Time_Period extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     // maxGradevalue == note optenue
    protected $fillable = [
       'StartHour', 'EndHour', 'DayOFWeek'
    ];

    public function absence()
    {
      return $this->hasOne('App\Absence');
    }

    public function courseschedule()
    {
      return $this->hasOne('App\CourseSchedule');
    }
}
