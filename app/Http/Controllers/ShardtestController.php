<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shardtest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Facades\ShardSelector;

class ShardtestController extends Controller
{
    //定数
    const numprepage = 5;

    //シャーディングのテストコントローラー
    public function index() {
        // $shard_test = new Shardtest();
        // $shard_test->setConnection('shard'.(Auth::user()->id % 2));
        // $val = $shard_test->where('user_id',Auth::user()->id)->first();

        // ShardSelector::setShard(ShardSelector::getShardName(Auth::user()->id));
        // $shard_test = new Shardtest();
        $shard_test = new Shardtest(Auth::user()->id);
        $val =  $shard_test->where('user_id',Auth::user()->id)->first();
        return view('shard/index',['val'=>$val]);
    }

    public function list() {
        // $shard_test = new Shardtest(Auth::user()->id);
        $alllist =  $this->alllist();
        $cnt = $this->countdata();
        $result = [
            'alllist' => $alllist,
            'cnt' => $cnt
        ];

        return $result;
    }

    public function search(Request $request){
        $inputparams = []; //入力
        //セッションでフォームのインプットデータを受け渡している
        $request->Session()->put('inputparams',$inputparams);
    }

    // シャードの垣根を超えて全てのデータ取得
    private function alllist(){
        $list = collect([]);
        $shrd_id_list = ShardSelector::getAllShards();
        foreach($shrd_id_list as $shard_id){
            $shard_test = new Shardtest($shard_id);
            ShardSelector::setShard($shard_id);
            $umodeldata = $shard_test->get();
            $list->push($umodeldata);
        }

        return $list; //多次元配列を1次元配列化する
    }

    //シャードの垣根を超えて全てのデータ数を取得
    private function countdata(){
        $cnt = 0;
        $shrd_id_list = ShardSelector::getAllShards();
        foreach($shrd_id_list as $shard_id){
            $shard_test = new Shardtest($shard_id);
            ShardSelector::setShard($shard_id);
            // $cnt = $cnt + self::count();
            $cnt = $cnt + $shard_test->count();
        }

        return $cnt;
    }

    //オフセット値計算
    private function culoffset($alldatamun,$pagenum){
        $offset = -1;
        //総ページ数を求めてチェック処理
        if($alldatamun % self::numprepage === 0){
            $allpagenum =  $alldatamun - ($alldatamun % self::numprepage) / self::numprepage;
        }else{
            $allpagenum =  $alldatamun - ($alldatamun % self::numprepage) / self::numprepage +1;
        }
        if($allpagenum < $pagenum){
            return $offset;
        }
        //オフセット
        $offset = self::numprepage * ($pagenum -1) + 1;
        return $offset;
    }

    //limit&offsetで指定した場所から指定したページ数分のデータを取得する
    private function limitgetdata($alldatamun,$pagenum){
        $offset = $this->culoffset($alldatamun,$pagenum);
        $allpagenum = $this->getallpagenum($alldatamun);
        $is_lastpage = $this->checklastpage($allpagenum,$pagenum);
    }

    private function getallpagenum($alldatamun){
        //総ページ数を求めてチェック処理
        if($alldatamun % self::numprepage === 0){
            $allpagenum =  $alldatamun - ($alldatamun % self::numprepage) / self::numprepage;
        }else{
            $allpagenum =  $alldatamun - ($alldatamun % self::numprepage) / self::numprepage +1;
        }
        return $allpagenum;
    }

    private function checklastpage($allpagenum,$pagenum){
        if($allpagenum === $pagenum){
            return True;
        }else{
            return False;
        }
    }

    //シャードの垣根を超えてデータを検索する

}
