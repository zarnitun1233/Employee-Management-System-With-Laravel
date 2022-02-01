<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => Str::random(10),
            'email' =>'mikochanz183@gmail.com',
            'password' => Hash::make('password'),
            'position' => Str::random(10),
            'role' => Str::random(10),
            'age' => 12,
            'image' =>  Str::random(10),
            'phone' =>12345,
            'dob'   =>Str::random(10),
            'address' => Str::random(10),
            'department_id' => 1,
            
        ]);
    }
}
