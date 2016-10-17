
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class StudentLevel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'StudentID', 'SessionID', 'LevelID', 'AcademicYear'
    ];

    public function session()
    {
      return $this->belongsTo('App\Session');
    }

    public function student()
    {
      return $this->belongsTo('App\Student');
    }

    public function level()
    {
      return $this->belongsTo('App\Level');
    }
}
