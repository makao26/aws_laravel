<?php

namespace App\Utility;

use App\Models\AccessCounter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Utility
{
  public static function accessCounter($url){
    return DB::transaction(function ()  use ($url) {
      Log::debug('try');
      $access_counter = AccessCounter::lockForUpdate()->where('url','=',$url)->first();
      if(empty($access_counter))
      {
        Log::debug('try if 01');
        $access_counter = AccessCounter::create([
          'url' => $url,
          'count' => 1
        ]);
        Log::debug('try if 02');
        $access_counter->save();
        Log::debug('try if 03');
      }else{
        Log::debug('try else');
        $access_counter->update([
          'count' => $access_counter->count + 1
        ]);
      }
    });
  }
}
