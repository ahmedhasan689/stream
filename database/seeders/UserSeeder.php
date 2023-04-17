<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();

        $data = [
            [
                'name' => 'User One',
                'email' => 'user_one@test.com',
                'password' => Hash::make('123456'),
                'gender' => 'male',
                'date_of_birth' => '1999-06-10',
                'image' => 'uploads/avatar.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Two',
                'email' => 'user_two@test.com',
                'password' => Hash::make('12345678'),
                'gender' => 'female',
                'date_of_birth' => '1998-07-15',
                'image' => 'uploads/avatar.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Three',
                'email' => 'user_three@test.com',
                'password' => Hash::make('123456789'),
                'gender' => 'male',
                'date_of_birth' => '2000-12-19',
                'image' => 'uploads/avatar.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Four',
                'email' => 'user_four@test.com',
                'password' => Hash::make('1234567890'),
                'gender' => 'male',
                'date_of_birth' => '1999-07-10',
                'image' => 'uploads/avatar.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            User::create([
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => $value['password'],
                'gender' => $value['gender'],
                'date_of_birth' => $value['date_of_birth'],
                'image' => $value['image'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }

    }
}
