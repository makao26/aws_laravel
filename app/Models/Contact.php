<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $table = 'contacts';

  public function contactCategory(){
    return $this->belongsTo('App\Models\ContactCategory');
  }

  public function getContactCategory(){
    return $this->contactCategory->category_text;
  }
}
