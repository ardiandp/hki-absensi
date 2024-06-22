<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Attendance;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Attendance::class;
    public function definition(): array
    {
        return [
           
                'user_id' => $this->faker->numberBetween(1, 10),
                'date' => $this->faker->date(),
                'check_in' => $this->faker->time($format = 'H:i:s', $max = 'now'),
                'check_out' => $this->faker->optional()->time($format = 'H:i:s', $max = 'now'),
          
        ];
    }
}
