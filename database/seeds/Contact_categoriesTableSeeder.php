<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Contact_categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $param = [
        'category_text' => 'お問い合わせ項目を選択してください',
      ];
      DB::table('contact_categories')->insert($param);

      $param = [
        'category_text' => 'お仕事に関するお問い合わせ',
      ];
      DB::table('contact_categories')->insert($param);

      $param = [
        'category_text' => '私個人に関するご意見・ご感想',
      ];
      DB::table('contact_categories')->insert($param);

      $param = [
        'category_text' => 'その他お問い合わせ',
      ];
      DB::table('contact_categories')->insert($param);
    }
}
