<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'EmpFirstName', 'EmpLastName','UserName', 'UserPassword','EmpEmail',
        'EmpStartDate', 'EmpEndedDate', 'EmpRoleID', 'EmpNbr'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function emprole()
    {
      $this->hasMany('App\EmpRole');
    }



}
