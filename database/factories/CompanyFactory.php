<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'company_name' => fake()->name(),
            'capasity' => rand(10,100),
            'mealcapacity' => rand(10,100),
            'price' => rand(10,100),
            'location' => Str::random(60),
            'email' => fake()->safeEmail(),
            'description' => Str::random(60),

            'telno' => fake()->phoneNumber(),

            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // "updated_at" => now(),
            // "created_at" =>now()
        ];
    }
}
