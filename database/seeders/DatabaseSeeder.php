<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RegionSeeder::class
        ]);

        \App\Models\User::factory(2345)->create();
        // \App\Models\Client::factory(1111)->create();
        // \App\Models\Proposal::factory(5750)->create();
    }
}
