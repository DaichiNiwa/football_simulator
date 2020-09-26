<?php

namespace Database\Seeders;

use App\Models\LoanOption;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            PlayerSeeder::class,
            AffiliationSeeder::class,
            LoanOptionSeeder::class,
        ]);
    }
}
