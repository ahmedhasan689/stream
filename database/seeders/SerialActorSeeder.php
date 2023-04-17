<?php

namespace Database\Seeders;

use App\Models\SerialActor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SerialActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('serial_actors')->truncate();

        $data = [
            [
                'actor_id' => 1,
                'serial_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'actor_id' => 2,
                'serial_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'actor_id' => 3,
                'serial_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'actor_id' => 1,
                'serial_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            SerialActor::create([
                'actor_id' => $value['actor_id'],
                'serial_id' => $value['serial_id'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }
    }
}
