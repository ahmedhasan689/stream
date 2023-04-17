<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('movies')->truncate();

        $data = [
            [
                'name' => 'Movie One',
                'slug' => 'movie_one',
                'image' => 'movieImage/3.jpg',
                'trailer' => 'movieTrailer/Trolls Band Together Trailer #1 (2023).mp4',
                'describe' => 'Describe For Movie One',
                'video' => 'movieVideo/The Super Mario Bros Movie TV Spot - Smash (2023).mp4',
                'link' => 'https://drive.google.com/file/d/1bvDCAAA6wBI-XWLSnv8Z5p5Q07ObbPIn/preview',
                'hour' => 1,
                'minute' => 40,
                'release_year' => 2023-1-30,
                'quality' => 720,
                'viewer' => 3,
                'evaluation' => 5,
                'age_group' => 16,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Movie Two',
                'slug' => 'movie_two',
                'image' => 'movieImage/code.jpg',
                'trailer' => 'movieTrailer/The Super Mario Bros Movie TV Spot - Smash (2023).mp4',
                'describe' => 'Describe For Movie Two',
                'video' => 'movieVideo/The Super Mario Bros. Movie Final Trailer (2023).mp4',
                'link' => 'https://drive.google.com/file/d/1bvDCAAA6wBI-XWLSnv8Z5p5Q07ObbPIn/preview',
                'hour' => 2,
                'minute' => 45,
                'release_year' => 2023-2-25,
                'quality' => 1080,
                'viewer' => 30,
                'evaluation' => 3,
                'age_group' => 18,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Movie Three',
                'slug' => 'movie_three',
                'image' => 'movieImage/code.png',
                'trailer' => 'movieTrailer/The Super Mario Bros. Movie Final Trailer (2023).mp4',
                'describe' => 'Describe For Movie Three',
                'video' => 'movieVideo/Trolls Band Together Trailer #1 (2023).mp4',
                'link' => 'https://drive.google.com/file/d/1bvDCAAA6wBI-XWLSnv8Z5p5Q07ObbPIn/preview',
                'hour' => 1,
                'minute' => 45,
                'release_year' => 2023-3-30,
                'quality' => 480,
                'viewer' => 90,
                'evaluation' => 5,
                'age_group' => 15,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        foreach ( $data as $key => $value ) {
            Movie::create([
                'name' => $value['name'],
                'slug' => $value['slug'],
                'image' => $value['image'],
                'describe' => $value['describe'],
                'trailer' => $value['trailer'],
                'video' => $value['video'],
                'link' => $value['link'],
                'age_group' => $value['age_group'],
                'hour' => $value['hour'],
                'minute' => $value['minute'],
                'quality' => $value['quality'],
                'evaluation' => $value['evaluation'],
                'status' => $value['status'],
                'release_year' => $value['release_year'],
                'viewer' => $value['viewer'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }

    }
}
