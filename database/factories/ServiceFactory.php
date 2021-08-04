<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgName = $this->faker->image(storage_path("app/public/uploads/services"), $width = 640, $height = 480, 'cats', false);
        return [
            'name' => $this->faker->name(),
            'icon' => "uploads/services/" . $imgName,
        ];
    }
}
