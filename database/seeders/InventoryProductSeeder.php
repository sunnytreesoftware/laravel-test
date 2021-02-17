<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $inventory = [
        ['car_vin' => '1G6DP577460183539','car_model'=>'SpaceX','price'=>43206.69,'stock'=>5,'year'=>'1984','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ['car_vin' => '1C3BCBGG6EN125016','car_model'=>'9-4X','price'=>38845.74,'stock'=>5,'year'=>'2011','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ['car_vin' => 'WAUNF98P38A414306','car_model'=>'New Beetle','price'=>22805.92,'stock'=>6,'year'=>'2006','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ['car_vin' => 'WVGEF9BP5DD225561','car_model'=>'Sonata','price'=>47429.42,'stock'=>1,'year'=>'2007','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ['car_vin' => 'TRUWC28N611212805','car_model'=>'E250','price'=>23842.91,'stock'=>2,'year'=>'1984','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ['car_vin' => 'WUATNAFG2EN833868','car_model'=>'Spectra','price'=>49306.67,'stock'=>0,'year'=>'2008','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ['car_vin' => '1FTMF1CWXAF001531','car_model'=>'Eclipse','price'=>46726.54,'stock'=>0,'year'=>'2007','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ['car_vin' => '1G4GH5E34DF311727','car_model'=>'FX','price'=>20813.52,'stock'=>5,'year'=>'2009','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ['car_vin' => '1G6DW677760766728','car_model'=>'Lancer','price'=>39535.44,'stock'=>7,'year'=>'2008','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ['car_vin' => '1G6DM8EVXA0619010','car_model'=>'Tacoma','price'=>45297.34,'stock'=>5,'year'=>'1995','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
      ];
      DB::table('product_inventories')->insert($inventory);
    }
}
