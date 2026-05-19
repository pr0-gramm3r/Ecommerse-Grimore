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
        foreach (['spring', 'summer', 'autumn', 'winter'] as $season) {
            Season::firstOrCreate(['season_name' => $season]);
        }
    }
}
