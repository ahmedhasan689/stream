<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('plans')->truncate();

        $data = [
            [
                'name' => 'Plan One',
                'plan_id' => 1,
                'price' => 250,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plan Two',
                'plan_id' => 2,
                'price' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plan Three',
                'plan_id' => 3,
                'price' => 750,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plan Four',
                'plan_id' => 4,
                'price' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ( $data as $key => $value ) {
            Plan::create([
                'name' => $value['name'],
                'plan_id' => $value['plan_id'],
                'price' => $value['price'],
                'created_at' => $value['created_at'],
                'updated_at' => $value['updated_at'],
            ]);
        }

    }
}
