<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        for($i = 2;$i < 11;$i++){
            DB::table('users')->insert([
                'name' => 'test' . $i,
                'emial' => 'test'.$i.'@email.com',
                'password' => 'password',
                ]);
            for($j = 0;$j<=2;$j++){
                DB::table('posts')->insert([
                    ''
                    ])
            }
        }
    }
}
