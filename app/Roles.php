<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'roles';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = [
      'name'
  ];

  public function user()
  {
     return $this->belongsTo("App\User");
  }
}
