<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->admin()->create([
            'name' => 'Admin Test',
            'email' => 'admin@email.com',
            'password' => '$2y$10$Sfzm3nwxnBR5ciDNd8kmVuBUI7T4lw21PR/xRsOStUN2i.nCkpzwa',
            'password_set_token' => Str::random(40),
        ]);

        User::factory()->assessor()->create([
            'name' => 'Assessor Test',
            'email' => 'assessor@email.com',
            'password' => '$2y$10$Sfzm3nwxnBR5ciDNd8kmVuBUI7T4lw21PR/xRsOStUN2i.nCkpzwa',
            'password_set_token' => Str::random(40),
        ]);
    }
}
