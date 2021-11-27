<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('animals')->insert([
           'name' => 'Harimau',
           'description' => 'Panthera tigris',
           'created_at' => now(),
           'updated_at' => now()
       ]);
    }
}
