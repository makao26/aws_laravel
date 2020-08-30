<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluation;

class RecommendController extends Controller
{

    public function index()
    {
        //ログイン中のユーザーID取得
        $id = Auth::user()->id;
        Log::debug($id);
        
        //全件取得
        $evaluations = Evaluation::get();
        //重複なしのユーザを取得
        $user_ids =  Evaluation::distinct()->select('user_id')->get();
        // Log::debug($user_ids);
        //コレクション型->連想配列へ変換
        $dataset = $this->repackdata($evaluations,$user_ids);
        // Log::debug($dataset);
        //オススメアイテム取得
        $recommend_info = $this->get_recommend(7,2,$dataset);//暫定　引数
        Log::debug($recommend_info);
        return view('admin.recommend.index');
    }

    //コレクション型から扱いやすい連想配列へ変形する
    private function repackdata($evaluations , $user_ids)
    {
        $dataset = [];
        foreach($user_ids as $idx => $user_id){
            $temp_data = [];
            $temp_evaluations = $evaluations->where('user_id',$user_id->user_id);
            foreach($temp_evaluations as $i => $temp_evaluation){
                $temp_data += array($temp_evaluation->item_id => $temp_evaluation->evaluation);
            }
            $dataset += array($user_id->user_id => $temp_data);
        }
        return $dataset;
    }

    private function get_similairty($person1, $person2,$dataset)
    {
        //重複なしのperson1、2の連想配列のkey(各perosonがみた映画)の積集合取得
        $set_person1 = array_values(array_unique(array_keys($dataset[$person1])));
        $set_person2 = array_values(array_unique(array_keys($dataset[$person2])));
        $set_both = array_intersect($set_person1 , $set_person2);

        //共通でみた映画がない場合は類似度を0とする
        if(count($set_both) === 0)
        {
            return 0;
        }

        $list_destance = [];
        foreach($set_both as $key => $item)
        {
            //同じ映画のレビュー点の差の2乗を計算
            //この数値が大きいほど「気が合わない」=「似ていない」と定義できる 
            $distance = pow($dataset[$person1][$item]-$dataset[$person2][$item],2);
            $list_destance[] = $distance;
        }

        //各映画の気の合わなさの合計の逆比的な指標を返す
        return 1/(1+sqrt(array_sum($list_destance)));
    }

    function get_recommend($person, $top_N,$dataset)
    {
        Log::debug('recommend_start');
        // Log::debug($dataset);
        $totals = [];
        $simSums = [];
        //自分以外のユーザのリストを取得してFor文を回す
        $list_others = array_keys($dataset);
        $list_others = array_values(array_diff($list_others, array($person)));
        Log::debug('$list_others');
        Log::debug($list_others);

        foreach ($list_others as $key => $other)
        {
            //本人がまだ見たことが無い映画の集合(差集合)を取得
            //phpにset型(集合型)が存在しないのいでkey値の配列
            $set_other = array_values(array_unique(array_keys($dataset[$other])));
            $set_person = array_values(array_unique(array_keys($dataset[$person])));
            $set_new_movei = array_values(array_diff($set_other, $set_person));
            //あるユーザと本人の類似度を計算(simは0~1の数字)
            $sim = $this->get_similairty($person, $other,$dataset);
            // Log::debug($sim);
            Log::debug('$set_other');
            Log::debug($set_other);
            Log::debug('$set_person');
            Log::debug($set_person);
            Log::debug('diff');
            Log::debug(array_diff($set_other, $set_person));

            foreach($set_new_movei as $idx => $item)
            {
                //"類似度 x レビュー点数" を推薦度のスコアとして、全ユーザで積算する
                //すでに同一のキーが存在した場合は上書きしないようにarray_mergeではなく+を使用した
                // Log::debug('$item');
                // Log::debug($item);
                $totals = $totals + array($item=>0);
                // Log::debug('$totals');
                // Log::debug($totals);
                $totals[$item] += $dataset[$other][$item]*$sim;
                $simSums = $simSums + array($item=>0);
                $simSums[$item] += $sim;
            }

        }
        Log::debug('$totals');
        Log::debug($totals);
        
        $rankings = [];
        foreach($totals as $item=>$total)
        {
            $rankings = $rankings + array($item=>$total/$simSums[$item]);
        }
        // Log::debug('$rankings');
        // Log::debug($rankings);
        arsort($rankings);
        $result = [];
        $cnt = 1 ; //カウンタ変数
        foreach($rankings as $key => $ranking){
            if($cnt > $top_N){
                break;
            }
            $cnt++;
            array_push($result,$key);
        }
        Log::debug('recommend_end');
        return $result;
    }
}
