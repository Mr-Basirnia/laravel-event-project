<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Country;
use App\Models\Tag;
use App\Models\User;
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
            'name' => 'mmdAmin',
            'email' => 'mmdAmin@example.com',
        ]);

        Country::create(['name' => 'Iran']);
        Country::create(['name' => 'Germany']);

        City::create(['country_id' => 1, 'name' => 'Bandar e Turkman']);
        City::create(['country_id' => 1, 'name' => 'Gorgan']);
        City::create(['country_id' => 1, 'name' => 'Gonbad']);
        City::create(['country_id' => 2, 'name' => 'simin shahr']);
        City::create(['country_id' => 2, 'name' => 'kordkoy']);
        City::create(['country_id' => 2, 'name' => 'sigival']);


        Tag::create(['name' => 'Laravel', 'slug' => 'laravel']);
        Tag::create(['name' => 'Vue Js', 'slug' => 'vue-js']);
        Tag::create(['name' => 'React Js', 'slug' => 'react-js']);
    }
}
