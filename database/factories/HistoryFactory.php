<?php

namespace Database\Factories;

use App\Models\History;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class HistoryFactory extends Factory
{
    protected $model = History::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'starting' => $this->faker->time,
            'ending' => $this->faker->time,
            'subject' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}