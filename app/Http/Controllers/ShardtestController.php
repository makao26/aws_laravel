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

        ShardSelector::setShard(ShardSelector::getShardName(Auth::user()->id));
        $shard_test = new Shardtest();
        $val =  $shard_test->where('user_id',Auth::user()->id)->first();
        return view('shard/index',['val'=>$val]);
    }
}
