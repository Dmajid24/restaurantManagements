<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\StaffPosition;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MsStaff>
 */
class MsStaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'staffID' => Str::random(10),
            'staffName' => fake()->name(),
            'staffpositionID' => StaffPosition::inRandomOrder()->first()->positionID ?? StaffPosition::factory(),
            'staffAddress' => fake()->address(),
            'cityID' => City::inRandomOrder()->first()->cityId ?? City::factory(),
        ];
    }
}
