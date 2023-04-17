<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('actors')->truncate();

        $data = [
            [
                'name' => 'Actor One',
                'describe' => 'Describe For Actor One',
                'image' => 'ActorImage/avatar.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Actor Two',
                'describe' => 'Describe For Actor Two',
                'image' => 'ActorImage/avatar.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Actor Three',
                'describe' => 'Describe For Actor Three',
                'image' => 'ActorImage/avatar.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            Actor::create([
                'name' => $value['name'],
                'image' => $value['image'],
                'describe' => $value['describe'],
                'status' => $value['status'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }

    }
}
