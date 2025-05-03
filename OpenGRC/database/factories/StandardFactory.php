<?php

namespace Database\Factories;

use App\Enums\StandardStatus;
use App\Models\Standard;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StandardFactory extends Factory
{
    protected $model = Standard::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'code' => $this->faker->word(),
            'authority' => $this->faker->word(),
            'status' => $this->faker->randomElement(StandardStatus::class),
            'reference_url' => $this->faker->url(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
