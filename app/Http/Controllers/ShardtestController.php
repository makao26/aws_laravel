<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shardtest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Facades\ShardSelector;

class ShardtestController extends Controller
{
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

    // シャードの垣根を超えて全てのデータ取得
    public function alllist(){
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
    public function countdata(){
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
}
