<?php

namespace Database\Factories;

use App\Models\Clearance;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClearanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clearance::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'registration_number' => $this->faker->text(255),
            'block_number' => $this->faker->text(255),
            'room_number' => $this->faker->text(255),
            'level' => $this->faker->text(4),
            'librarian' => '0',
            'bursar' => '0',
            'class_teacher' => '0',
            'matron_patron' => '0',
            'store_keeper' => '0',
            'academic_master' => '0',
            'head_master' => '0',
            'student_id' => \App\Models\Student::factory(),
        ];
    }
}