<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateShiftsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Update shifts with user_id to 'assigned'
        Shift::whereNotNull('user_id')
            ->where('status', '!=', 'worked')
            ->update(['status' => 'assigned']);

        // Update shifts without user_id to 'unassigned'
        Shift::whereNull('user_id')
            ->update(['status' => 'unassigned']);
    }
}
