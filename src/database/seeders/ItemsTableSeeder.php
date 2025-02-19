<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'item_img' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Armani+Mens+Clock.jpg',
            'item_condition' => '良好',
            'item_name' => '腕時計',
            'item_brand' => '',
            'item_description' => 'スタイリッシュなデザインのメンズ腕時計',
            'item_price' => 15000
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_img' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD+Hard+Disk.jpg',
            'item_condition' => '目立った傷や汚れなし',
            'item_name' => 'HDD',
            'item_brand' => '',
            'item_description' => '高速で信頼性の高いハードディスク',
            'item_price' => 5000
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_img' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/iLoveIMG+d.jpg',
            'item_condition' => 'やや傷や汚れあり',
            'item_name' => '玉ねぎ3束',
            'item_brand' => '',
            'item_description' => '新鮮な玉ねぎ3束のセット',
            'item_price' => 300
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_img' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes+Product+Photo.jpg',
            'item_condition' => '状態が悪い',
            'item_name' => '革靴',
            'item_brand' => '',
            'item_description' => 'クラシックなデザインの革靴',
            'item_price' => 4000
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_img' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg',
            'item_condition' => '良好',
            'item_name' => 'ノートPC',
            'item_brand' => '',
            'item_description' => '高性能なノートパソコン',
            'item_price' => 45000
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_img' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic+4632231.jpg',
            'item_condition' => '目立った傷や汚れなし',
            'item_name' => 'マイク',
            'item_brand' => '',
            'item_description' => '高音質のレコーディング用マイク',
            'item_price' => 8000
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_img' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg',
            'item_condition' => 'やや傷や汚れあり',
            'item_name' => 'ショルダーバッグ',
            'item_brand' => '',
            'item_description' => 'おしゃれなショルダーバッグ',
            'item_price' => 3500
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_img' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Tumbler+souvenir.jpg',
            'item_condition' => '状態が悪い',
            'item_name' => 'タンブラー',
            'item_brand' => '',
            'item_description' => '使いやすいタンブラー',
            'item_price' => 500
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_img' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg',
            'item_condition' => '良好',
            'item_name' => 'コーヒーミル',
            'item_brand' => '',
            'item_description' => '手動のコーヒーミル',
            'item_price' => 4000
        ];
        DB::table('items')->insert($param);
        $param = [
            'item_img' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg',
            'item_condition' => '目立った傷や汚れなし',
            'item_name' => 'メイクセット',
            'item_brand' => '',
            'item_description' => '便利なメイクアップセット',
            'item_price' => 2500
        ];
        DB::table('items')->insert($param);
    }
}
