<?php

namespace Database\Factories;

use App\Models\Room_Service;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class Room_ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room_Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id' => Room::all() ->random()->id,
            'service_id' => Service::all() ->random()->id,
            'additional_price' => $this->faker->numberBetween(100,1000),
        ];
    }
}
