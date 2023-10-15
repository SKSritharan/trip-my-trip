<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'owner_id' => 2,
            'model' => $this->faker->word,
            'passenger_seats_available' => $this->faker->numberBetween(1, 10),
            'vehicle_number' => $this->generateVehicleNumber(),
            'payment_type' => $this->faker->randomElement(['Payment per seat', 'Payment per day']),
            'amount' => $this->faker->randomFloat(2, 10, 500),
            'pickup_point' => $this->faker->address,
            'img_url' => $this->faker->imageUrl(),
        ];
    }

    protected function generateVehicleNumber()
    {
        // Customize the format of your vehicle number as needed
        $prefix = strtoupper($this->faker->randomLetter . $this->faker->randomLetter);
        $digits = $this->faker->numberBetween(1000, 9999);

        return $prefix . $digits;
    }
}
