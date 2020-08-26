<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Evaluation;

class RecommendController extends Controller
{

    public function index(){
        //全件取得
        $evaluations = Evaluation::get();
        $user_ids =  Evaluation::distinct()->select('user_id')->get();
        $dataset = $this->repackdata($evaluations,$user_ids);
        Log::debug($dataset);
        return view('admin.recommend.index');
    }

    //コレクション型から扱いやすい連想配列へ変形する
    private function repackdata($evaluations , $user_ids){
        $dataset = [];
        foreach($user_ids as $idx => $user_id){
            $temp_data = [];
            $temp_evaluations = $evaluations::where('user_id',$user_id->user_id);
            foreach($temp_evaluations as $i => $temp_evaluation){
                $temp_data += array($temp_evaluation->item_id => $temp_evaluation->evaluation);
            }
            $dataset += array($user_id->user_id => $temp_data);
        }
        return $dataset;
    }

    // private function get_similairty($person1, $person2,$dataset){
        
    // }
}
