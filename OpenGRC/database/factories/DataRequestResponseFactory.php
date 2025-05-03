<?php

namespace Database\Factories;

use App\Models\DataRequest;
use App\Models\DataRequestResponse;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataRequestResponseFactory extends Factory
{
    protected $model = DataRequestResponse::class;

    public function definition(): array
    {
        return [
            'response' => $this->faker->text(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'data_request_id' => DataRequest::all()->random()->id,
            'requester_id' => User::all()->random()->id,
            'requestee_id' => User::all()->random()->id,
        ];
    }
}
