<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class CourseGrade extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courseGrade';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'studentMatricule', 'semestreID', 'TestID', 'Grade', 'Appreciation'
    ];

    public function semestre()
    {
      return $this->belongsTo('App\Semestre');
    }

    public function student()
    {
      return $this->belongsTo('App\Student');
    }

    public function coursetest()
    {
      return $this->belongsTo('App\CourseTest');
    }

    // public function coursechild()
    // {
    //   return $this->belongsTo('App\CourseChildID');
    // }


}
