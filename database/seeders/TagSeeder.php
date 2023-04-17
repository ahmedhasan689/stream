<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('tags')->truncate();

        $data = [
            [
                'name' => 'Tag One',
                'slug' => 'tag_one',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'name' => 'Tag Two',
                'slug' => 'tag_two',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'name' => 'Tag Three',
                'slug' => 'tag_three',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'name' => 'Tag Four',
                'slug' => 'tag_four',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'name' => 'Tag Five',
                'slug' => 'tag_five',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'name' => 'Tag Six',
                'slug' => 'tag_six',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'name' => 'Tag Seven',
                'slug' => 'tag_seven',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'name' => 'Tag Eight',
                'slug' => 'tag_eight',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
            [
                'name' => 'Tag Nine',
                'slug' => 'tag_nine',
                'created_at' =>  now(),
                'updated_at' =>  now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            Tag::create([
                'name' => $value['name'],
                'slug' => $value['slug'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }
    }
}
