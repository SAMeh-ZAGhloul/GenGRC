<?php

namespace Database\Factories;

use App\Enums\Effectiveness;
use App\Enums\ImplementationStatus;
use App\Models\Implementation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ImplementationFactory extends Factory
{
    protected $model = Implementation::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->word(),
            'title' => $this->faker->word(),
            'details' => $this->faker->text(),
            'status' => $this->faker->randomElement(ImplementationStatus::class),
            'notes' => $this->faker->text(),
            'effectiveness' => $this->faker->randomElement(Effectiveness::class),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
