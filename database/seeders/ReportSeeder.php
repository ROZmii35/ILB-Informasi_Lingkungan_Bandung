<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    public function run()
    {
        // Buat beberapa user biasa
        User::factory(5)->create()->each(function ($user) {
            // Buat 3 laporan untuk setiap user
            Report::factory(3)->create([
                'user_id' => $user->id
            ]);
        });
    }
} 