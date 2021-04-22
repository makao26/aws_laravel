<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ShardSelector extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'shardselector';
    }
}