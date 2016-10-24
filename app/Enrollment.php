<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Enrollment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'academicYear', 'classRoomID'
    ];

    public function anneescolaire()
    {
      return $this->belongsTo('App\AnneeScolaire');
    }

    public function classroom()
    {
      return $this->belongsTo("App\ClassRoom");
    }
}
