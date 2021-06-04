<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends UModel
{
  protected $table = 'articles';

  // 全件取得はUMOdelに定義済

  public static function searchlist($inputparams){
    $query = self::query();
    // $created_at_chk = false;
    // $updated_at_chk = false;
    $articles = array();
    $query = Article::query();
    if(!empty($inputparams['title']))
    {
      $query->where('title','like','%'.$inputparams['title'].'%');
    }
    if(!empty($inputparams['category']))
    {
      $query->where('category','like','%'.$inputparams['category'].'%');
    }
    if(!empty($inputparams['created_at_min']) && !empty($inputparams['created_at_max']))
    {
      $query->whereBetween('created_at', [$inputparams['created_at_min'], $inputparams['created_at_max']]);
    }
    if(!empty($inputparams['updated_at_min']) && !empty($inputparams['updated_at_max']))
    {
      $query->whereBetween('updated_at', [$inputparams['updated_at_min'], $inputparams['updated_at_max']]);
    }
    $query->orderBy('created_at','desc');
    $articles = $query->paginate(3);


    // $article_categories = self:: orderBy('id', 'asc')->get();
    return $articles;
  }
}
