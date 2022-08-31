<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([ //1
            'name' => 'admin',
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
        DB::table('roles')->insert([ //2
            'name' => 'customer',
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
        DB::table('roles')->insert([ //3
            'name' => 'cleaner',
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
    }
}
