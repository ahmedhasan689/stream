<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaggableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('taggables')->truncate();

        $data = [
            [
                'tag_id' => 1,
                'taggable_id' => 1,
                'taggable_type' => 'App\\Models\\Movie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 2,
                'taggable_id' => 1,
                'taggable_type' => 'App\\Models\\Episode',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 3,
                'taggable_id' => 2,
                'taggable_type' => 'App\\Models\\Movie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 4,
                'taggable_id' => 2,
                'taggable_type' => 'App\\Models\\Episode',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 5,
                'taggable_id' => 1,
                'taggable_type' => 'App\\Models\\Movie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 5,
                'taggable_id' => 3,
                'taggable_type' => 'App\\Models\\Episode',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 6,
                'taggable_id' => 3,
                'taggable_type' => 'App\\Models\\Movie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 7,
                'taggable_id' => 4,
                'taggable_type' => 'App\\Models\\Episode',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            DB::table('taggables')->insert([
                'tag_id' => $value['tag_id'],
                'taggable_id' => $value['taggable_id'],
                'taggable_type' => $value['taggable_type'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }
    }
}
