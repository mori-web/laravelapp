<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
          'name' => 'taro',
          'mail' => 'taro@yamada.jp',
          'age' => 12,
        ];
        DB::table('people')->insert($param);

        $param = [
          'name' => 'hanako',
          'mail' => 'hanako@sasaki.jp',
          'age' => 25,
        ];
        DB::table('people')->insert($param);

        $param = [
          'name' => 'hiroki',
          'mail' => 'hiroki@makita.jp',
          'age' => 36,
        ];
        DB::table('people')->insert($param);
    }
}
