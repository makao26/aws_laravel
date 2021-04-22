<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ShardSelector;

class ShardselectorProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton('shardselector','App\Services\ShardSelector');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
