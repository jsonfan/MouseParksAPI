<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
      'id',
      'created_at',
      'updated_at'
  ];
}
