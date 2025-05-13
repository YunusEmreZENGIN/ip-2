<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
class CardTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('card_types')->insert([
            [
                'slug'=>'person',
                'title'=>'Kişi Kartı',
                'meta'=>json_encode(["ad"=>"","soyad"=>"","personel_no"=>""]),
            ],
            [
                'slug'=>'operation',
                'title'=>'Operasyon Kartı',
                'meta'=>json_encode(["hat"=>"", "operasyon"=>""]),
            ],
            [
                'slug'=>'bundle',
                'title'=>'Demet Kartı',
                'meta'=>json_encode([
                    'siparis_no'=>"",
                    'musteri_siparis_no'=>"",
                    'model_kodu'=>"",
                    'urun_adi'=>"",
                    'adet'=>0
                ]),
            ],
        ]);
    }
}
