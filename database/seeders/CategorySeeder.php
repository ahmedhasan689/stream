<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('categories')->truncate();

        $data = [
            [
                'name' => 'Category One',
                'slug' => 'category_one',
                'type' => 'movie',
                'status' => 1,
                'image' => 'CategoryImage/2.jpg',
                'describe' => 'Describe For Category One',
                'evaluation' => 5,
                'viewer' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category Two',
                'slug' => 'category_two',
                'type' => 'serial',
                'status' => 1,
                'image' => 'CategoryImage/3.jpg',
                'describe' => 'Describe For Category Two',
                'evaluation' => 4,
                'viewer' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category Three',
                'slug' => 'category_three',
                'type' => 'movie',
                'status' => 1,
                'image' => 'CategoryImage/code.jpg',
                'describe' => 'Describe For Category Three',
                'evaluation' => 3,
                'viewer' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category Four',
                'slug' => 'category_four',
                'type' => 'serial',
                'status' => 1,
                'image' => 'CategoryImage/code.png',
                'describe' => 'Describe For Category Four',
                'evaluation' => 5,
                'viewer' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category Five',
                'slug' => 'category_five',
                'type' => 'movie',
                'status' => 1,
                'image' => 'CategoryImage/code2.jpg',
                'describe' => 'Describe For Category Five',
                'evaluation' => 2,
                'viewer' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category Six',
                'slug' => 'category_six',
                'type' => 'serial',
                'status' => 1,
                'image' => 'CategoryImage/php.jpg',
                'describe' => 'Describe For Category Six',
                'evaluation' => 3,
                'viewer' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category Seven',
                'slug' => 'category_seven',
                'type' => 'movie',
                'status' => 1,
                'image' => 'CategoryImage/code3.jpg',
                'describe' => 'Describe For Category Seven',
                'evaluation' => 1,
                'viewer' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category Eight',
                'slug' => 'category_eight',
                'type' => 'serial',
                'status' => 1,
                'image' => 'CategoryImage/wp6829830.jpg',
                'describe' => 'Describe For Category Eight',
                'evaluation' => 1,
                'viewer' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            Category::create([
                'name' => $value['name'],
                'slug' => $value['slug'],
                'type' => $value['type'],
                'status' => $value['status'],
                'image' => $value['image'],
                'describe' => $value['describe'],
                'evaluation' => $value['evaluation'],
                'viewer' => $value['viewer'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }
    }
}
