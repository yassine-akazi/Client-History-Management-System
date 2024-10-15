<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HistorySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Generate 10 fake history records
        for ($i = 0; $i < 10; $i++) {
            DB::table('histories')->insert([
                'full_name' => $faker->name,
                'email' => $faker->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'starting' => $faker->dateTimeBetween('-1 month', 'now'),
                'ending' => $faker->dateTimeBetween('now', '+1 month'),
                'subject' => $faker->sentence(3),
                'description' => $faker->paragraph,
            ]);
        }
    }
}