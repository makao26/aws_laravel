<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessCounter extends Model
{
  protected $table = 'access_counters';
  protected $fillable = [
    'url',
    'count'
  ];
}
