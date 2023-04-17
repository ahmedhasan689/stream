<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('blogs')->truncate();

        $data = [
            [
                'title' => 'Title For Blog One',
                'slug' => 'title_for_blog_one',
                'short_description' => 'Short Description For Blog One',
                'long_description' => 'Long Description For Blog One, Long Description For Blog One, Long Description For Blog One, Long Description For Blog One',
                'cover_image' => 'cover_image/2.jpg',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Title For Blog Two',
                'slug' => 'title_for_blog_two',
                'short_description' => 'Short Description For Blog Two',
                'long_description' => 'Long Description For Blog Two, Long Description For Blog Two, Long Description For Blog Two, Long Description For Blog Two',
                'cover_image' => 'cover_image/3.jpg',
                'user_id' => 2,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Title For Blog Three',
                'slug' => 'title_for_blog_three',
                'short_description' => 'Short Description For Blog Three',
                'long_description' => 'Long Description For Blog Three, Long Description For Blog Three, Long Description For Blog Three, Long Description For Blog Three',
                'cover_image' => 'cover_image/code.jpg',
                'user_id' => 1,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Title For Blog Four',
                'slug' => 'title_for_blog_four',
                'short_description' => 'Short Description For Blog Four',
                'long_description' => 'Long Description For Blog Four, Long Description For Blog Four, Long Description For Blog Four, Long Description For Blog Four',
                'cover_image' => 'cover_image/code.png',
                'user_id' => 1,
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Title For Blog Five',
                'slug' => 'title_for_blog_five',
                'short_description' => 'Short Description For Blog Five',
                'long_description' => 'Long Description For Blog Five, Long Description For Blog Five, Long Description For Blog Five, Long Description For Blog Five',
                'cover_image' => 'cover_image/code2.jpg',
                'user_id' => 2,
                'category_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Title For Blog Six',
                'slug' => 'title_for_blog_six',
                'short_description' => 'Short Description For Blog Six',
                'long_description' => 'Long Description For Blog Six, Long Description For Blog Six, Long Description For Blog Six, Long Description For Blog Six',
                'cover_image' => 'cover_image/code3.jpeg',
                'user_id' => 2,
                'category_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            Blog::create([
                'title' => $value['title'],
                'slug' => $value['slug'],
                'short_description' => $value['short_description'],
                'long_description' => $value['long_description'],
                'cover_image' => $value['cover_image'],
                'user_id' => $value['user_id'],
                'category_id' => $value['category_id'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }

    }
}
