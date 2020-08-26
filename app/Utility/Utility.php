<?php

namespace App\Utility;

use App\Models\AccessCounter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Utility
{
  public static function accessCounter($url){
    return DB::transaction(function ()  use ($url) {
      Log::debug('try');
      $access_counter = AccessCounter::lockForUpdate()->where('url','=',$url)->first();
      if(empty($access_counter))
      {
        Log::debug('try if 01');
        $access_counter = AccessCounter::create([
          'url' => $url,
          'count' => 1
        ]);
        Log::debug('try if 02');
        $access_counter->save();
        Log::debug('try if 03');
      }else{
        Log::debug('try else');
        $access_counter->update([
          'count' => $access_counter->count + 1
        ]);
      }
    });
  }

  public static function getPopulerArticles(){
    //記事アクセス数上位5位までのUrl取得
    $access_counters = AccessCounter::orderBy('count', 'DESC')->take(5)->get();
    //アクセスIDから記事のIDを取得
    //http://18.177.58.51/article/detail?id=1 のようなUrlを前提としている
    $article_ids = [];
    foreach ($access_counters as $key => $access_counter) {
      $explode_dir_list = explode('/',$access_counter->url);
      Log::debug($explode_dir_list);
      foreach ($explode_dir_list as $key => $explode_dir) {
        $explode_getparam_list = explode('?',$explode_dir);
        Log::debug($explode_getparam_list);
        if(count($explode_getparam_list) > 1){//文字列が2つ以上のときは分割している
          foreach ($explode_getparam_list as $key => $explode_getparam) {
            $explode_getid_list = explode('=',$explode_getparam);
            Log::debug($explode_getid_list);
            if(count($explode_getid_list) > 1){//文字列が2つ以上のときは分割している
              foreach ($explode_getid_list as $key => $explode_getid) {
                if(strcmp('id',$explode_getid) != 0){ //idじゃない場合、すなわちgetパラメータの値
                  array_push($article_ids,$explode_getid);
                }
              }
            }
          }
        }
      }
    }
    Log::debug($article_ids);
    return $article_ids;
  }
}
