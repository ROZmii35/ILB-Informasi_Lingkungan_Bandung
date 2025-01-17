<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    protected $model = Report::class;

    public function definition()
    {
        return [
            'lokasi' => $this->faker->address,
            'deskripsi' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['pending', 'selesai']),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
} 