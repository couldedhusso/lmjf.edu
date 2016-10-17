<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfPrincipal extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ProfPrincipal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idTeacher', 'classRoomID'
    ];

}
