<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Facades\ShardSelector;

/**
 * ユーザ系データ用のモデルのベースクラス
 */
class UModel extends Model
{
    //$tableは各テーブルで定義する
    // protected $table = '';

    // 共通コンストラクタ
    public function __construct($user_id,array $attaribute = []) {
        parent::__construct($attaribute);
        $shard_name = ShardSelector::getShardName($user_id);
        ShardSelector::setShard($shard_name);
        $this->connection = ShardSelector::getShard();
    }

    // // シャードの垣根を超えて全てのデータ取得
    // public function alllist(){
    //     $list = collect([]);
    //     $shrd_id_list = ShardSelector::getAllShards();
    //     foreach($shrd_id_list as $shard_id){
    //         ShardSelector::setShard($shard_id);
    //         // $umodeldata = self::all();
    //         $umodeldata = $this->all();
    //         $list->push($umodeldata);
    //     }

    //     return $list->flattern(); //多次元配列を1次元配列化する
    // }

    //シャードの垣根を超えて全てのデータ数を取得
    public function countdata(){
        $cnt = 0;
        $shrd_id_list = ShardSelector::getAllShards();
        foreach($shrd_id_list as $shard_id){
            ShardSelector::setShard($shard_id);
            // $cnt = $cnt + self::count();
            $cnt = $cnt + $this->count();
        }
    }
}
