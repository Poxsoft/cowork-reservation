<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create(['name' => 'Sala A', 'description' => 'Descripción de la Sala A']);
        Room::create(['name' => 'Sala B', 'description' => 'Descripción de la Sala B']);
    }
}
