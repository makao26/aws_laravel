<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactCategory extends Model
{
  protected $table = 'contact_categories';
  protected $guarded = array('id');
}
