<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\StaffPosition;
use Illuminate\Support\Str;

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
            'staffID' => Str::uuid()->toString(),
            'staffName' => fake()->name(),
            'staffpositionID' => StaffPosition::inRandomOrder()->first()->positionID ?? StaffPosition::factory(),
            'staffAddress' => fake()->address(),
            'cityID' => City::inRandomOrder()->first()->cityId ?? City::factory(),
        ];
    }
}
