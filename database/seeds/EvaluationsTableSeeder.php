<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'item_type' => 1,
            'item_id' => 1,
            'item_nm' => 'Lady in the Water',
            'evaluation' => 2.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 1,
            'item_type' => 1,
            'item_id' => 2,
            'item_nm' => 'Snakes on a Plane',
            'evaluation' => 3.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 1,
            'item_type' => 1,
            'item_id' => 3,
            'item_nm' => 'Just My Luck',
            'evaluation' => 3.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 1,
            'item_type' => 1,
            'item_id' => 4,
            'item_nm' => 'Superman Returns',
            'evaluation' => 3.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 1,
            'item_type' => 1,
            'item_id' => 5,
            'item_nm' => 'You, Me and Dupree',
            'evaluation' => 2.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 1,
            'item_type' => 1,
            'item_id' => 6,
            'item_nm' => 'The Night Listener',
            'evaluation' => 3.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 2,
            'item_type' => 1,
            'item_id' => 1,
            'item_nm' => 'Lady in the Water',
            'evaluation' => 3.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 2,
            'item_type' => 1,
            'item_id' => 2,
            'item_nm' => 'Snakes on a Plane',
            'evaluation' => 3.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 2,
            'item_type' => 1,
            'item_id' => 3,
            'item_nm' => 'Just My Luck',
            'evaluation' => 1.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 2,
            'item_type' => 1,
            'item_id' => 4,
            'item_nm' => 'Superman Returns',
            'evaluation' => 5.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 2,
            'item_type' => 1,
            'item_id' => 6,
            'item_nm' => 'The Night Listener',
            'evaluation' => 3.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 2,
            'item_type' => 1,
            'item_id' => 5,
            'item_nm' => 'You, Me and Dupree',
            'evaluation' => 3.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 3,
            'item_type' => 1,
            'item_id' => 1,
            'item_nm' => 'Lady in the Water',
            'evaluation' => 2.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 3,
            'item_type' => 1,
            'item_id' => 2,
            'item_nm' => 'Snakes on a Plane',
            'evaluation' => 3.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 3,
            'item_type' => 1,
            'item_id' => 4,
            'item_nm' => 'Superman Returns',
            'evaluation' => 3.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 3,
            'item_type' => 1,
            'item_id' => 6,
            'item_nm' => 'The Night Listener',
            'evaluation' => 4.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 4,
            'item_type' => 1,
            'item_id' => 2,
            'item_nm' => 'Snakes on a Plane',
            'evaluation' => 3.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 4,
            'item_type' => 1,
            'item_id' => 3,
            'item_nm' => 'Just My Luck',
            'evaluation' => 3.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 4,
            'item_type' => 1,
            'item_id' => 6,
            'item_nm' => 'The Night Listener',
            'evaluation' => 4.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 4,
            'item_type' => 1,
            'item_id' => 4,
            'item_nm' => 'Superman Returns',
            'evaluation' => 4.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 4,
            'item_type' => 1,
            'item_id' => 5,
            'item_nm' => 'You, Me and Dupree',
            'evaluation' => 2.5
        ];
        DB::table('evaluations')->insert($param);
        
        $param = [
            'user_id' => 5,
            'item_type' => 1,
            'item_id' => 1,
            'item_nm' => 'Lady in the Water',
            'evaluation' => 3.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 5,
            'item_type' => 1,
            'item_id' => 2,
            'item_nm' => 'Snakes on a Plane',
            'evaluation' => 4.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 5,
            'item_type' => 1,
            'item_id' => 3,
            'item_nm' => 'Just My Luck',
            'evaluation' => 2.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 5,
            'item_type' => 1,
            'item_id' => 4,
            'item_nm' => 'Superman Returns',
            'evaluation' => 3.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 5,
            'item_type' => 1,
            'item_id' => 6,
            'item_nm' => 'The Night Listener',
            'evaluation' => 3.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 5,
            'item_type' => 1,
            'item_id' => 5,
            'item_nm' => 'You, Me and Dupree',
            'evaluation' => 2.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 6,
            'item_type' => 1,
            'item_id' => 1,
            'item_nm' => 'Lady in the Water',
            'evaluation' => 3.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 6,
            'item_type' => 1,
            'item_id' => 2,
            'item_nm' => 'Snakes on a Plane',
            'evaluation' => 4.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 6,
            'item_type' => 1,
            'item_id' => 6,
            'item_nm' => 'The Night Listener',
            'evaluation' => 3.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 6,
            'item_type' => 1,
            'item_id' => 4,
            'item_nm' => 'Superman Returns',
            'evaluation' => 5.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 6,
            'item_type' => 1,
            'item_id' => 5,
            'item_nm' => 'You, Me and Dupree',
            'evaluation' => 3.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 7,
            'item_type' => 1,
            'item_id' => 2,
            'item_nm' => 'Snakes on a Plane',
            'evaluation' => 4.5
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 7,
            'item_type' => 1,
            'item_id' => 5,
            'item_nm' => 'You, Me and Dupree',
            'evaluation' => 1.0
        ];
        DB::table('evaluations')->insert($param);

        $param = [
            'user_id' => 7,
            'item_type' => 1,
            'item_id' => 4,
            'item_nm' => 'Superman Returns',
            'evaluation' => 4.0
        ];
        DB::table('evaluations')->insert($param);

    }
}
