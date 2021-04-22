<?php
namespace App\Services;

use Illuminate\Support\Facades\Log;


class ShardSelector
{
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
        return 'shard'.($userId % 2);
    }
}