
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'classRomLocationName', 'ClassRoomName', 'ClassRoomDescription', 'BuildingLevel'
        ,'BuildingID', 'typeClassRoom', 'classRoomID'
    ];

    public function teacher()
    {
      return $this->hasMany('App\Teacher');
    }

    public function student()
    {
      return $this->hasMany('App\Student');
    }

    public function courseschedule()
    {
      return $this->hasOne('App\CourseSchedule');
    }




}
