<?php

namespace Database\Seeders;

use App\Models\Centre;
use Illuminate\Database\Seeder;

class CentreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Centre::factory()->centre()->create();

        Centre::factory()->setting()->create();
    }
}
