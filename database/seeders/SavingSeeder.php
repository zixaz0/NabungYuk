<?php

namespace Database\Seeders;

use App\Models\Saving;
use Illuminate\Database\Seeder;

class SavingSeeder extends Seeder
{
    public function run(): void
    {
        Saving::truncate();

        // Buat 1 baris saldo awal = 0
        Saving::create(['balance' => 0]);
    }
}