<?php

namespace Database\Seeders;

use App\Models\MovieActor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('movie_actors')->truncate();

        $data = [
            [
                'actor_id' => 1,
                'movie_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'actor_id' => 2,
                'movie_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'actor_id' => 3,
                'movie_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'actor_id' => 1,
                'movie_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            MovieActor::create([
                'actor_id' => $value['actor_id'],
                'movie_id' => $value['movie_id'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }
    }
}
