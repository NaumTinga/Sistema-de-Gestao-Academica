<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Docentes>
 */
class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome'  => $this->faker->name(),
            'dataNascimento'  => $this->faker->date(),
            'morada'  => $this->faker->address(),
            'naturalidade'  => $this->faker->country(),
            'genero'  => $this->faker->gender(),
            'grauAcademico'  => $this->faker->name(),
            'nrTelefone'  => $this->faker->phoneNumber($max = 9, $min = 1), 
            'email'  => $this->faker->sentence(3),
        ];
    }
}
