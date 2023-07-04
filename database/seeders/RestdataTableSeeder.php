<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restdata;

class RestdataTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // goolgle
    $param = [
      'message' => 'Google Japan',
      'url' => 'https://www.google.co.jp',
    ];
    $restdata = new Restdata;
    $restdata->fill($param)->save();

    //yahoo
    $param = [
      'message' => 'Yahoo Japan',
      'url' => 'https://www.yahoo.co.jp',
    ];
    $restdata = new Restdata;
    $restdata->fill($param)->save();

    //MSN
    $param = [
      'message' => 'MSN Japan',
      'url' => 'https://www.msn.co.jp',
    ];
    $restdata = new Restdata;
    $restdata->fill($param)->save();
  }
}
