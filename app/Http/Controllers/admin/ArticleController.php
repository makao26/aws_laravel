<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Article;
use Storage;

class ArticleController extends Controller
{

  private function getSearchArticleParam(Request $request)
  {
    $inputparams = [
      'title' => $request->input('title'),
      'category' => $request->input('category'),
      'created_at_min' => $request->input('created_at_min'),
      'created_at_max' => $request->input('created_at_max'),
      'updated_at_min' => $request->input('updated_at_min'),
      'updated_at_max' => $request->input('updated_at_max')
    ];
    return $inputparams;
  }

  private function articleValidate(Request $request){
    $validate_rule = [
      'title' => 'required',
      'category' => 'required',
      'text'=> 'required',
      'image' => 'image|mimes:jpeg,png,jpg,gif'
    ];
    $this->validate($request,$validate_rule);
  }

  private function postImage(Request $request){
    $image = $request->file('image');

    // バケットの`myprefix`フォルダへアップロード
    // $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');//S3へアップロード
    // // アップロードした画像のフルパスを取得
    // $image_path = Storage::disk('s3')->url($path);//S3のファイルパス
    //
    $path = Storage::disk('public')->putFile('/article_img', $image, 'public');
    $image_path = Storage::disk('public')->url($path);//ローカルのファイルパス
    return $image_path;
  }

  private function saveArticle(Request $request , Article $article){
    $form = $request->all();
    unset($form['_token']);
    $article->title = $request->title;
    $article->text = $request->text;
    $article->category = $request->category;
    $article->image_path = $this->postImage($request);
    $article->save();
  }


  // /*一覧表示*/
  public function index(Request $request)
  {
    $inputparams = $request->session()->get('inputparams');
    Log::debug($inputparams);
    $created_at_chk = false;
    $updated_at_chk = false;
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
    Log::debug($articles);
    return view('admin.article.index',['articles'=>$articles]);
    //return view('admin.article.index');
  }

  public function searcharticle(Request $request)
  {
    $inputparams = $this->getSearchArticleParam($request);
    //Log::debug($inputparams);
    //セッションでフォームのインプットデータを受け渡している
    $request->Session()->put('inputparams',$inputparams);
    return redirect('admin/article');
  }

  //新規記事投稿
  public function add(Request $request){
    return view('admin.article.add');
  }
  public function create(Request $request){
    $this->articleValidate($request);
    $article = new Article;
    $this->saveArticle($request,$article);
    return redirect('/admin/article/add');
  }
}
