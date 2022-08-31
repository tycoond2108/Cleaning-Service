<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        DB::table('users')->insert([
            'firstname' => 'admin',
            'lastname' => 'admon',
            'username' => 'admin001',
            'email' => 'admin@example.com',
            'role_id' => 1,
            //'author_id' => 1,
            
            'phone' => random_int(100000000 ,1000000000),

            'address' => 'bla bla bla bla bla bla bla bla bla bla bla bla   bla bla bla bla bla bla bla bla bla bla ',

            'country' => 'england',
            'state' => 'london',
            'city' => 'balee',
            'zip' => '01234',
            'language' => 'English',
            'birthdate' => '1999-01-01',
            'password' => Hash::make('00000000'),
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
        //customer
        DB::table('users')->insert([
            'firstname' => 'manoj',
            'lastname' => 'essam',
            'username' => 'manoj_123',
            'email' => 'manoj@example.com',
            'role_id' => 2,
            //'author_id' => 2,
            
            'phone' => random_int(100000000 ,1000000000),

            'address' => 'bla bla bla bla bla bla bla bla bla bla bla bla   bla bla bla bla bla bla bla bla bla bla ',

            'country' => 'US',
            'state' => 'texas',
            'city' => 'maldive',
            'zip' => '6547',
            'language' => 'English',
            'birthdate' => '1992-02-02',
            'password' => Hash::make('00000000'),
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
        //cleaner
        DB::table('users')->insert([
            'firstname' => 'hoda',
            'lastname' => 'elmofty',
            'username' => 'dodo123',
            'email' => 'hoda@example.com',
            'role_id' => 3,
            //'author_id' => 3,
            
            'phone' => random_int(100000000 ,1000000000),

            'address' => 'bla bla bla bla bla bla bla bla bla bla bla bla   bla bla bla bla bla bla bla bla bla bla ',

            'country' => 'canada',
            'state' => 'sharqia',
            'city' => 'met masoad',
            'zip' => '506040',
            'language' => 'English',
            'birthdate' => '1980-03-03',
            'price_per_hour' => 15,
            'password' => Hash::make('00000000'),
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);

        //cleaner
        DB::table('users')->insert([
            'firstname' => 'hoda',
            'lastname' => 'elmofty',
            'username' => 'dodo1231',
            'email' => 'hoda1@example.com',
            'role_id' => 3,
            //'author_id' => 3,
            
            'phone' => random_int(100000000 ,1000000000),

            'address' => 'bla bla bla bla bla bla bla bla bla bla bla bla   bla bla bla bla bla bla bla bla bla bla ',

            'country' => 'canada',
            'state' => 'sharqia',
            'city' => 'met masoad',
            'zip' => '506040',
            'language' => 'English',
            'birthdate' => '1980-03-03',
            'price_per_hour' => 10,
            'password' => Hash::make('00000000'),
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
        //cleaner
        DB::table('users')->insert([
            'firstname' => 'hoda',
            'lastname' => 'elmofty',
            'username' => 'dodo1232',
            'email' => 'hoda2@example.com',
            'role_id' => 3,
            //'author_id' => 3,
            
            'phone' => random_int(100000000 ,1000000000),

            'address' => 'bla bla bla bla bla bla bla bla bla bla bla bla   bla bla bla bla bla bla bla bla bla bla ',

            'country' => 'canada',
            'state' => 'sharqia',
            'city' => 'met masoad',
            'zip' => '506040',
            'language' => 'English',
            'birthdate' => '1980-03-03',
            'price_per_hour' => 7.5,
            'password' => Hash::make('00000000'),
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
        //cleaner
        DB::table('users')->insert([
            'firstname' => 'hoda',
            'lastname' => 'elmofty',
            'username' => 'dodo1233',
            'email' => 'hoda3@example.com',
            'role_id' => 3,
            //'author_id' => 3,
            
            'phone' => random_int(100000000 ,1000000000),

            'address' => 'bla bla bla bla bla bla bla bla bla bla bla bla   bla bla bla bla bla bla bla bla bla bla ',

            'country' => 'canada',
            'state' => 'sharqia',
            'city' => 'met masoad',
            'zip' => '506040',
            'language' => 'English',
            'birthdate' => '1980-03-03',
            'price_per_hour' => 6,
            'password' => Hash::make('00000000'),
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
        //cleaner
        DB::table('users')->insert([
            'firstname' => 'hoda',
            'lastname' => 'elmofty',
            'username' => 'dodo1234',
            'email' => 'hoda4@example.com',
            'role_id' => 3,
            //'author_id' => 3,
            
            'phone' => random_int(100000000 ,1000000000),

            'address' => 'bla bla bla bla bla bla bla bla bla bla bla bla   bla bla bla bla bla bla bla bla bla bla ',

            'country' => 'canada',
            'state' => 'sharqia',
            'city' => 'met masoad',
            'zip' => '506040',
            'language' => 'English',
            'birthdate' => '1980-03-03',
            'price_per_hour' => 9,
            'password' => Hash::make('00000000'),
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
        
        //cleaner
        DB::table('users')->insert([
            'firstname' => 'hoda',
            'lastname' => 'elmofty',
            'username' => 'dodo1235',
            'email' => 'hoda5@example.com',
            'role_id' => 3,
            //'author_id' => 3,
            
            'phone' => random_int(100000000 ,1000000000),

            'address' => 'bla bla bla bla bla bla bla bla bla bla bla bla   bla bla bla bla bla bla bla bla bla bla ',

            'country' => 'canada',
            'state' => 'sharqia',
            'city' => 'met masoad',
            'zip' => '506040',
            'language' => 'English',
            'birthdate' => '1980-03-03',
            'price_per_hour' => 20,
            'password' => Hash::make('00000000'),
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);

        //cleaner
        DB::table('users')->insert([
            'firstname' => 'hoda',
            'lastname' => 'elmofty',
            'username' => 'dodo1236',
            'email' => 'hoda6@example.com',
            'role_id' => 3,
            //'author_id' => 3,
            
            'phone' => random_int(100000000 ,1000000000),

            'address' => 'bla bla bla bla bla bla bla bla bla bla bla bla   bla bla bla bla bla bla bla bla bla bla ',

            'country' => 'canada',
            'state' => 'sharqia',
            'city' => 'met masoad',
            'zip' => '506040',
            'language' => 'English',
            'birthdate' => '1980-03-03',
            'price_per_hour' => 3.5,
            'password' => Hash::make('00000000'),
            'created_at' => '2022-08-02 16:22:02',
            'updated_at' => '2022-08-02 16:22:02',
        ]);
    }
}
