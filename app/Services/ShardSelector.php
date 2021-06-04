<?php
namespace App\Services;

use Illuminate\Support\Facades\Log;


class ShardSelector
{
    /** 現在の水平分割数 */
    const db_num = 2;

    /** 現在使用しているシャード */
    private $shard;

    public function _construct() {
        $this->shard = 'shard0';
    }

    public function setShard($shard) {
        $this->shard = $shard;
    }

    public function getShard() {
        return $this->shard;
    }

    /**
     * ユーザIDを元に使用するDB設定の名前を取得する
     *
     * @param int $userId ユーザID
     * @return string DB設定の名前
     */
    public function getShardName($userId) {
        return 'shard'.($userId % self::db_num);
    }

    public function getAllShards(){
        $shard_id_list = [];
        for($i=0;$i<self::db_num; $i++){
            $shard_id_list[] = $i;
        }

        return $shard_id_list;
    }
}