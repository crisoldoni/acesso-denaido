<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Crypt;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Access>
 */
class AccessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'rust_id'+> fake()->unique()->word(),
            'password' => fake()->Crypt::encryptString($validated['password']),
            'id_person' => \App\Models\Person::factory(),
            'id_group' => \App\Models\Group::factory(),
            ,
        ];
    }
}
