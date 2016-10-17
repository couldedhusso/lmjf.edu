<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Retard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     // position == rang de l eleve
    protected $fillable = [
       'studentMatricule', 'TimePeriodID', 'Date'
    ];

    public function student()
    {
      return $this->belongsTo('App\Student');
    }

    public function timeperiod()
    {
      return $this->belongsTo('App\TimePeriod');
    }

}
