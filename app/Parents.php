<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'Parent';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
     'parentID','parentPassword', 'parentFistName','parentLastName','parentTelephone'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'parentPassword', 'remember_token',
  ];

  public function student()
  {
     return $this->hasMany("App\Students");
  }

  // public function emprole()
  // {
  //   $this->hasMany('App\EmpRole');
  // }
}
