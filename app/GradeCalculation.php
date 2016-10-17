
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class GradeCalculation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'StudentID', 'SessionID'
    ];

    public function session()
    {
      return $this->belongsTo('App\Session');
    }

    public function student()
    {
      return $this->belongsTo('App\Student');
    }


}
