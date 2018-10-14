<?php

use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table('sitesettings')->insert([
           [
             'namesetting' => 'Company_name',
             'value' => 'Company name',
             'status' => 0
           ],
           [
             'namesetting' => 'logo',
             'value' => 'twitter.jpg',
             'status' => 1
           ],
           [
             'namesetting' => 'address',
             'value' => 'Company address',
             'status' => 0
           ],
           [
             'namesetting' => 'phone',
             'value' => '001684849309',
             'status' => 0
           ]
         ]);
     }
}
