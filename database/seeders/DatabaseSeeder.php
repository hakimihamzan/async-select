<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Location;
use App\Models\Project;
use App\Models\Reader;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Reader::factory(100)->create();

        Project::factory(20)->create();

        Location::factory(200)->create();

        User::factory()->create([
            'email' => 'admin@email.com'
        ]);
    }
}
