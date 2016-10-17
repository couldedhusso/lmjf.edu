
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cycle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
      'cycleName', 'cycleDescription', 'typeCycle'
    ];

    public function course()
    {
      return $this->hasMany('App\Course');
    }



}
