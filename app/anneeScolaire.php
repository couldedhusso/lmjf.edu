<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AnneeScolaire extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anneeScolaire';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     // position == rang de l eleve
    protected $fillable = [
       'academicYear'
    ];

    public function coursetest()
    {
      return $this->hasMany('App\CourseTest');
    }

    public function semestre()
    {
      return $this->hasMany('App\Semestre');
    }


}
