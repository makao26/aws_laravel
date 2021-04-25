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


}
