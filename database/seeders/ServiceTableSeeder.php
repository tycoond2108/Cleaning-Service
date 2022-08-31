<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Deep cleaning',
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
        
        DB::table('services')->insert([
            'name' => 'Sweeping the floor',
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);

        DB::table('services')->insert([
            'name' => 'Light cleaning',
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
    }
}
