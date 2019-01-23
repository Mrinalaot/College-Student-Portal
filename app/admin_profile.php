<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_profile extends Model
{
    //
    protected $fillable = [
    'user_id',
    'first_name',
    'surname',
    'mobile',
    'address',
  ];
}
