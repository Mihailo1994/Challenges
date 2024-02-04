<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\Vehicle;
use Faker\Provider\Fakecar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $faker->addProvider(new Fakecar($faker));

        for($i = 0; $i < 10; $i++){
            Vehicle::create([
                'brand' => $faker->vehicleBrand,
                'model' => $faker->vehicleModel,
                'plate_number' => $faker->vehicleRegistration,
                'insurance_date' => Carbon::now()->addDays(rand(-180, +180))->format('Y-m-d')
            ]);
        }
    }
}


