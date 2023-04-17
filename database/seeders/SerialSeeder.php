<?php

namespace Database\Seeders;

use App\Models\Serial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SerialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('serials')->truncate();

        $data = [
            [
                'name' => 'Serial One',
                'slug' => 'serial_one',
                'describe' => 'Describe For Serial One',
                'image' => 'serialImage/code.png',
                'release_year' => 2005-12-06,
                'trailer' => 'serialTrailer/Guardians of the Galaxy Vol. 3 - Greatest Hits (2023).mp4',
                'age_group' => 15,
                'evaluation' => 4,
                'status' => 1,
                'viewer' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Serial Two',
                'slug' => 'serial_two',
                'describe' => 'Describe For Serial Two',
                'image' => 'serialImage/2.jpg',
                'release_year' => 2005-06-06,
                'trailer' => 'serialTrailer/Guy Ritchie\'s The Covenant Featurette - One Man’s Debt (2023).mp4',
                'age_group' => 17,
                'evaluation' => 5,
                'status' => 1,
                'viewer' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            Serial::create([
                'name' => $value['name'],
                'slug' => $value['slug'],
                'describe' => $value['describe'],
                'image' => $value['image'],
                'release_year' => $value['release_year'],
                'trailer' => $value['trailer'],
                'age_group' => $value['age_group'],
                'evaluation' => $value['evaluation'],
                'status' => $value['status'],
                'viewer' => $value['viewer'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }
    }
}
