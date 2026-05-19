<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Season;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Season::create(['season_name' => 'Spring']);
        Season::create(['season_name' => 'Summer']);
        Season::create(['season_name' => 'Autumn']);
        Season::create(['season_name' => 'Winter']);
    }
}
