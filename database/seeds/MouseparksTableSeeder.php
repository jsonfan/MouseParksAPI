<?php

use Illuminate\Database\Seeder;

class MouseparksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parks')->insert([
                 'name' => 'Disneyland',
                 'short_name' => 'dlusa',
                 'park_id' => '330339',
                 'resort' => 'dlr',
                 'region' => 'us',
                 'city' => 'Anaheim',
                 'country' => 'USA',
                 'is_intl' => false
      ]);
      DB::table('parks')->insert([
                 'name' => 'Disney California Adventure',
                 'short_name' => 'dca',
                 'park_id' => '336894',
                 'resort' => 'dlr',
                 'region' => 'us',
                 'city' => 'Anaheim',
                 'country' => 'USA',
                 'is_intl' => false
      ]);
      DB::table('parks')->insert([
                 'name' => "Disney's Animal Kingdom",
                 'short_name' => 'ak',
                 'park_id' => '80007823',
                 'resort' => 'wdw',
                 'region' => 'us',
                 'city' => 'Orlando',
                 'country' => 'USA',
                 'is_intl' => false
      ]);
      DB::table('parks')->insert([
                 'name' => 'Epcot',
                 'short_name' => 'epcot',
                 'park_id' => '80007838',
                 'resort' => 'wdw',
                 'region' => 'us',
                 'city' => 'Orlando',
                 'country' => 'USA',
                 'is_intl' => false
      ]);
      DB::table('parks')->insert([
                 'name' => "Disney's Hollywood Studios",
                 'short_name' => 'hlyst',
                 'park_id' => '80007998',
                 'resort' => 'wdw',
                 'region' => 'us',
                 'city' => 'Orlando',
                 'country' => 'USA',
                 'is_intl' => false
      ]);
      DB::table('parks')->insert([
                 'name' => "Magic Kingdom",
                 'short_name' => 'mk',
                 'park_id' => '80007944',
                 'resort' => 'wdw',
                 'region' => 'us',
                 'city' => 'Orlando',
                 'country' => 'USA',
                 'is_intl' => false
      ]);
      DB::table('parks')->insert([
                 'name' => "Shanghai Disneyland",
                 'short_name' => 'sh',
                 'park_id' => 'desShanghaiDisneyland',
                 'resort' => 'shdr',
                 'region' => 'cn',
                 'city' => 'Shanghai',
                 'country' => 'China',
                 'is_intl' => true
      ]);
      DB::table('parks')->insert([
                 'name' => "Hong Kong Disneyland",
                 'short_name' => 'hk',
                 'park_id' => 'desHongKongDisneyland',
                 'resort' => 'hkdl',
                 'region' => 'INTL',
                 'city' => 'Lantau Island',
                 'country' => 'Hong Kong',
                 'is_intl' => true
      ]);
      DB::table('parks')->insert([
                 'name' => "Disneyland Paris",
                 'short_name' => 'dlp',
                 'park_id' => 'P1',
                 'resort' => 'dlp',
                 'region' => 'INTL',
                 'city' => 'Paris',
                 'country' => 'France',
                 'is_intl' => true
      ]);
      DB::table('parks')->insert([
                 'name' => "Walt Disney Studios Paris",
                 'short_name' => 'wdsp',
                 'park_id' => 'P2',
                 'resort' => 'dlp',
                 'region' => 'INTL',
                 'city' => 'Paris',
                 'country' => 'France',
                 'is_intl' => true
      ]);
    }
}
