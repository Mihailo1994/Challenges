<?php

namespace Database\Factories;

use Carbon\Carbon;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Factory::create();
        $faker->addProvider(new Fakecar($faker));

        return [
            'brand' => $faker->vehicleBrand,
            'model' => $faker->vehicleModel,
            'plate_number' => $faker->vehicleRegistration,
            'insurance_expiry_date' => Carbon::now()->addDays(rand(-180, +180))->format('Y-m-d')
        ];
    }
}
