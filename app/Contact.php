<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $table = 'Contacts';

  public function contactCategory(){
    return $this->blongsTo(ContactCategory::class);
  }
}
