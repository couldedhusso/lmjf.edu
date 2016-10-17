<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpRole extends Model
{
    protected $fillable = ['RoleName', 'RoleDescription', 'StartedDate', 'EndedDate'];

    public function users()
    {
      $this->belongsToMany('App\User');
    }

    public function teacher()
    {
      $this->belongsToMany('App\Teacher');
    }

    public function employee()
    {
      $this->belongsToMany('App\Employee');
    }

}
