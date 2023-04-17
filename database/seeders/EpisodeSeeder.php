<?php

namespace Database\Seeders;

use App\Models\Episode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('episodes')->truncate();

        $data = [
            [
                'name' => 'Episode One',
                'slug' => 'episode_one',
                'image' => 'imageVideo/2.jpg',
                'trailer' => 'episodeTrailer/Trolls Band Together Trailer #1 (2023).mp4',
                'describe' => 'Describe For Episode One',
                'video' => 'episodeVideo/Ruby Gillman, Teenage Kraken Trailer #1 (2023).mp4',
                'link' => 'https://drive.google.com/file/d/1bvDCAAA6wBI-XWLSnv8Z5p5Q07ObbPIn/preview',
                'episode_number' => 1,
                'hour' => 1,
                'minute' => 40,
                'release_year' => 2023-1-30,
                'quality' => 720,
                'viewer' => 3,
                'evaluation' => 5,
                'status' => 1,
                'season_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Episode Two',
                'slug' => 'episode_two',
                'image' => 'imageVideo/3.jpg',
                'trailer' => 'episodeTrailer/The Super Mario Bros. Movie Final Trailer (2023).mp4',
                'describe' => 'Describe For Episode Two',
                'video' => 'episodeVideo/Suzume Teaser Trailer (2023).mp4',
                'link' => 'https://drive.google.com/file/d/1bvDCAAA6wBI-XWLSnv8Z5p5Q07ObbPIn/preview',
                'episode_number' => 1,
                'hour' => 1,
                'minute' => 25,
                'release_year' => 2023-2-25,
                'quality' => 480,
                'viewer' => 50,
                'evaluation' => 4,
                'status' => 1,
                'season_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Episode Three',
                'slug' => 'episode_three',
                'image' => 'imageVideo/code.jpg',
                'trailer' => 'episodeTrailer/The Marvels Teaser Trailer (2023).mp4',
                'describe' => 'Describe For Episode Three',
                'video' => 'episodeVideo/Teenage Mutant Ninja Turtles- Mutant Mayhem Teaser Trailer (2023).mp4',
                'link' => 'https://drive.google.com/file/d/1bvDCAAA6wBI-XWLSnv8Z5p5Q07ObbPIn/preview',
                'episode_number' => 2,
                'hour' => 2,
                'minute' => 30,
                'release_year' => 2023-2-25,
                'quality' => 480,
                'viewer' => 30,
                'evaluation' => 3,
                'status' => 1,
                'season_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Episode Four',
                'slug' => 'episode_four',
                'image' => 'imageVideo/code.png',
                'trailer' => 'episodeTrailer/Teenage Mutant Ninja Turtles- Mutant Mayhem Teaser Trailer (2023).mp4',
                'describe' => 'Describe For Episode Four',
                'video' => 'episodeVideo/The Marvels Teaser Trailer (2023).mp4',
                'link' => 'https://drive.google.com/file/d/1bvDCAAA6wBI-XWLSnv8Z5p5Q07ObbPIn/preview',
                'episode_number' => 1,
                'hour' => 2,
                'minute' => 30,
                'release_year' => 2022-3-25,
                'quality' => 1080,
                'viewer' => 40,
                'evaluation' => 5,
                'status' => 1,
                'season_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Episode Five',
                'slug' => 'episode_five',
                'image' => 'imageVideo/code2.jpg',
                'trailer' => 'episodeTrailer/Suzume Teaser Trailer (2023).mp4',
                'describe' => 'Describe For Episode Five',
                'video' => 'episodeVideo/The Super Mario Bros. Movie Final Trailer (2023).mp4',
                'link' => 'https://drive.google.com/file/d/1bvDCAAA6wBI-XWLSnv8Z5p5Q07ObbPIn/preview',
                'episode_number' => 1,
                'hour' => 2,
                'minute' => 30,
                'release_year' => 2022-4-25,
                'quality' => 1080,
                'viewer' => 44,
                'evaluation' => 3,
                'status' => 1,
                'season_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Episode Six',
                'slug' => 'episode_six',
                'image' => 'imageVideo/code3.jpg',
                'trailer' => 'episodeTrailer/Ruby Gillman, Teenage Kraken Trailer #1 (2023).mp4',
                'describe' => 'Describe For Episode Six',
                'video' => 'episodeVideo/Trolls Band Together Trailer #1 (2023).mp4',
                'link' => 'https://drive.google.com/file/d/1bvDCAAA6wBI-XWLSnv8Z5p5Q07ObbPIn/preview',
                'episode_number' => 2,
                'hour' => 1,
                'minute' => 30,
                'release_year' => 2023-4-5,
                'quality' => 1080,
                'viewer' => 80,
                'evaluation' => 5,
                'status' => 1,
                'season_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            Episode::create([
                'name' => $value['name'],
                'slug' => $value['slug'],
                'image' => $value['image'],
                'describe' => $value['describe'],
                'trailer' => $value['trailer'],
                'video' => $value['video'],
                'link' => $value['link'],
                'episode_number' => $value['episode_number'],
                'hour' => $value['hour'],
                'minute' => $value['minute'],
                'quality' => $value['quality'],
                'evaluation' => $value['evaluation'],
                'status' => $value['status'],
                'release_year' => $value['release_year'],
                'viewer' => $value['viewer'],
                'season_id' => $value['season_id'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }
    }
}
