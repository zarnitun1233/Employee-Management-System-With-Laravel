<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'position' => 'admin',
            'role' => 1,
            'age' => 23,
            'image' =>  Str::random(10),
            'phone' =>'09792954102',
            'dob'   =>'1998-01-01',
            'address' => 'Yangon',
            'department_id' => 1, 
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
