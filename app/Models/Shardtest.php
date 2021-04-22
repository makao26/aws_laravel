<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Facades\ShardSelector;

class Shardtest extends Model
{
    protected $table = 'shard_test';

    public function __construct(array $attaribute = []) {
        parent::__construct($attaribute);

        $this->connection = ShardSelector::getShard();
    }


}
