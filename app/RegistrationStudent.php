
<?php

namespace schoolManagementPlatform\Domain\Entities;

use Illuminate\Database\Eloquent\Model;


// POUR LES PARENTS D ELEVES

class RegistrationStudent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'RegistrationDate', 'paymentFee', 'Birthdate','due_fee', 'TotalFee', 'StudentID'
    ];


    public function student()
    {
       return $this->belongsTO("schoolManagementPlatform\Domain\Entities\Student");
    }

}
