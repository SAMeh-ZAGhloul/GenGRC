<?php

namespace Database\Factories;

use App\Enums\Applicability;
use App\Enums\ControlCategory;
use App\Enums\ControlEnforcementCategory;
use App\Enums\ControlType;
use App\Enums\Effectiveness;
use App\Models\Control;
use App\Models\Standard;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ControlFactory extends Factory
{
    protected $model = Control::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'code' => $this->faker->word(),
            'description' => $this->faker->text(),
            'discussion' => $this->faker->word(),
            'type' => $this->faker->randomElement(ControlType::class),
            'category' => $this->faker->randomElement(ControlCategory::class),
            'enforcement' => $this->faker->randomElement(ControlEnforcementCategory::class),
            'effectiveness' => $this->faker->randomElement(Effectiveness::class),
            'applicability' => $this->faker->randomElement(Applicability::class),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'standard_id' => Standard::factory(),
        ];
    }
}
