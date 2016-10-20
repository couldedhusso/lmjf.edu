<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTest extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courseTest';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     // maxGradevalue == note optenue
    protected $fillable = [
       'teacherID', 'testDescription', 'maxGradevalue','CourseChildID', 'semestreID',
       'created_at', 'CoursetestID', 'classRoomID'
    ];

    public function coursechild()
    {
      return $this->belongsTo('App\CourseChild');
    }

    public function semestre()
    {
      return $this->belongsTo('App\Semestre');
    }

    public function teacher()
    {
      return $this->belongsTo('App\Teacher');
    }


    public function coursegrade()
    {
      return $this->hasOne('App\CourseGrade');
    }
}
