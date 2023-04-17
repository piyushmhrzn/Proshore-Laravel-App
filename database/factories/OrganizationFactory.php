<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $designations = ['CEO', 'manager', 'designer', 'developer', 'tester', 'HR', 'trainee'];

        return [
            'title' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail(),
            'description' => $this->faker->paragraph,
            'address' => $this->faker->city,
            'estd_date' => $this->faker->date,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'designations' => $this->faker->randomElements($designations, rand(1, count($designations))),

        ];
    }
}

// randomElements(1,2) => 1.array to choose from & 2.no. of elements to select
// php artisan db:seed --class=OrganizationSeeder

