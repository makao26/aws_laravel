<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Article;
use Storage;
use App\Utility\Utility;


class ArticleController extends Controller
{
  private function getCategory()
  {

    $category_list = Article::distinct()->select('category')->get();
    return $category_list;
  }
  private function localStoragePathShap($path)
  {
    $dirs = explode('/',$path);

    $idxs = [];
    foreach ($dirs as $key => $dir) {
      Log::debug('$dirs['.$key.'] = '.$dir);
      if(strcmp('storage',$dir)==0 || strcmp('article_img',$dir)==0)
      {
        array_push($idxs,$key);
      }
    }
    foreach ($idxs as $key => $idx) {
      unset($dirs[$idx]);
    }
    //unset($dirs[$idx]);
    $dirs = array_values($dirs);
    //array_splice($dirs, $idx, 0, 'app');
    $path = implode('/',$dirs);
    Log::debug('$path : '.$path);
    return $path;
  }

  public function index(Request $request){
    $category = $request->input('category');
    Log::debug('$category : '.$category);
    if(empty($category)){
      Log::debug('empty category');
      $query = Article::query();
      $query->orderBy('updated_at','desc');
      $articles = $query->paginate(3);
      foreach ($articles as $article) {
        $article->text = mb_substr($article->text,0,20);
        Log::debug('$article->image_path : '.$article->image_path);
      }
    }else{
      Log::debug('not empty category');
      $articles = new Article();
      $articles = $articles->where('category','=',$category)->paginate(10)->appends($category);
    }
    $category_list = $this->getCategory();
    return view('article.index',['articles' => $articles,'category_list' => $category_list]);
  }

  public function detail(Request $request)
  {
    $url = request()->fullUrl(); //getパラメータ含めて取得
    Utility::accessCounter($url);//アクセス数カウント
    $populer_article_ids = Utility::getPopulerArticles();
    Log::debug($populer_article_ids);
    $article = Article::find($request->id);//記事詳細用データ
    $populer_articles = [];
    //ランキング順に表示したいため、whereInをあえて使っていない
    foreach ($populer_article_ids as $key => $populer_article_id) {
      $populer_article = Article::find($populer_article_id);
      Log::debug($populer_article);
      if(!empty($populer_article)){
        array_push($populer_articles,$populer_article);
      }
    }
    return view('article.detail',['article' => $article,'populer_articles'=> $populer_articles]);
  }


}
