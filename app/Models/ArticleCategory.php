<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
  protected $table = 'article_categories';

  public static function alllist(){
    $article_categories = self::orderBy('id', 'asc')->all();
    return $article_categories;
  }

}
