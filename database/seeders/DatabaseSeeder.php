<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\About;
use App\Models\Footer;
use App\Models\HomeSlides;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'username'=> 'admin',
            'email' => 'admin@portfolios.com',
        ]);
        HomeSlides::create();
        About::create();
        Footer::create();
    }
}
