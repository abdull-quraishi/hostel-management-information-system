<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Floor;
use App\Models\Room;

class HostelSeeder extends Seeder
{
    public function run()
    {
        // ============================
        // 1st Floor
        // ============================
        $firstFloor = Floor::create(['name' => 'First Floor']);

        Room::create([
            'floor_id' => $firstFloor->id,
            'room_number' => 'R1',
            'capacity' => 4
        ]);

        Room::create([
            'floor_id' => $firstFloor->id,
            'room_number' => 'R2',
            'capacity' => 4
        ]);

         Room::create([
            'floor_id' => $firstFloor->id,
            'room_number' => 'R3',
            'capacity' => 3
        ]);

         Room::create([
            'floor_id' => $firstFloor->id,
            'room_number' => 'R4',
            'capacity' => 3
        ]);


        // ============================
        // 2nd Floor
        // ============================
        $secondFloor = Floor::create(['name' => 'Second Floor']);

        Room::create(['floor_id' => $secondFloor->id, 'room_number' => 'R1', 'capacity' => 4]);
        Room::create(['floor_id' => $secondFloor->id, 'room_number' => 'R2', 'capacity' => 4]);
        Room::create(['floor_id' => $secondFloor->id, 'room_number' => 'R3', 'capacity' => 5]);
        Room::create(['floor_id' => $secondFloor->id, 'room_number' => 'R4', 'capacity' => 6]);

        // ============================
        // 3rd Floor
        // ============================
        $thirdFloor = Floor::create(['name' => 'Third Floor']);

        Room::create(['floor_id' => $thirdFloor->id, 'room_number' => 'R1', 'capacity' => 4]);
        Room::create(['floor_id' => $thirdFloor->id, 'room_number' => 'R2', 'capacity' => 6]);

        // ============================
        // Basement
        // ============================
        $basement = Floor::create(['name' => 'Basement']);

        Room::create(['floor_id' => $basement->id, 'room_number' => 'R1', 'capacity' => 5]);
        Room::create(['floor_id' => $basement->id, 'room_number' => 'R2', 'capacity' => 5]);
        Room::create(['floor_id' => $basement->id, 'room_number' => 'R3', 'capacity' => 6]);
        Room::create(['floor_id' => $basement->id, 'room_number' => 'R4', 'capacity' => 4]);
        Room::create(['floor_id' => $basement->id, 'room_number' => 'R5', 'capacity' => 4]);
        Room::create(['floor_id' => $basement->id, 'room_number' => 'R6', 'capacity' => 6]);
    }
}
