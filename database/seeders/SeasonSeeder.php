<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('seasons')->truncate();

        $data = [
            [
                'name' => 'Season One',
                'image' => 'seasonImage/code.jpg',
                'describe' => 'Describe For Season One',
                'trailer' => 'seasonTrailer/Guardians of the Galaxy Vol. 3 - Greatest Hits (2023).mp4',
                'evaluation' => 5,
                'number' => 1,
                'status' => 1,
                'release_year' => 2014-4-14,
                'viewer' => 20,
                'serial_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Season Two',
                'image' => 'seasonImage/code.png',
                'describe' => 'Describe For Season Two',
                'trailer' => 'seasonTrailer/Guy Ritchie\'s The Covenant Featurette - One Man’s Debt (2023).mp4',
                'evaluation' => 4,
                'number' => 2,
                'status' => 1,
                'release_year' => 2016-4-14,
                'viewer' => 10,
                'serial_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Season Three',
                'image' => 'seasonImage/code3.jpeg',
                'describe' => 'Describe For Season Three',
                'trailer' => 'seasonTrailer/Migration Teaser (2023).mp4',
                'evaluation' => 2,
                'number' => 1,
                'status' => 1,
                'release_year' => 2015-4-24,
                'viewer' => 40,
                'serial_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Season Four',
                'image' => 'seasonImage/php.jpg',
                'describe' => 'Describe For Season Four',
                'trailer' => 'seasonTrailer/Spider-Man- Across the Spider-Verse Trailer #2 (2023).mp4',
                'evaluation' => 3,
                'number' => 2,
                'status' => 1,
                'release_year' => 2018-5-20,
                'viewer' => 5,
                'serial_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Season Five',
                'image' => 'seasonImage/wp6829830.jpg',
                'describe' => 'Describe For Season Five',
                'trailer' => 'seasonTrailer/Trolls Band Together Trailer #1 (2023).mp4',
                'evaluation' => 5,
                'number' => 3,
                'status' => 1,
                'release_year' => 2019-10-10,
                'viewer' => 80,
                'serial_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            Season::create([
                'name' => $value['name'],
                'image' => $value['image'],
                'describe' => $value['describe'],
                'trailer' => $value['trailer'],
                'evaluation' => $value['evaluation'],
                'number' => $value['number'],
                'status' => $value['status'],
                'release_year' => $value['release_year'],
                'viewer' => $value['viewer'],
                'serial_id' => $value['serial_id'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }

    }
}
