<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
  protected $table = 'articlecategories';

  public static function alllist(){
    $article_categories = self::orderBy('id', 'asc')->get();
    return $article_categories;
  }

}
