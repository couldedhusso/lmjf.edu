
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AverageGrade extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     // position == rang de l eleve

    protected $fillable = [
       'semestreID', 'studentMatricule', 'comitteeAppreciation', 'position', 'NbrStudent'
    ];

    public function semestre()
    {
      return $this->belongsTo('App\Semestre');
    }

    public function student()
    {
      return $this->belongsTo('App\Student');
    }

}
