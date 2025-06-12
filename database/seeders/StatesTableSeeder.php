<?php
namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('states')->delete();

        $provinces = [
            'Banteay Meanchey',
            'Battambang',
            'Kampong Cham',
            'Kampong Chhnang',
            'Kampong Speu',
            'Kampong Thom',
            'Kampot',
            'Kandal',
            'Kep',
            'Koh Kong',
            'Kratie',
            'Mondulkiri',
            'Oddar Meanchey',
            'Pailin',
            'Phnom Penh', // Capital (treated as a province)
            'Preah Sihanouk',
            'Preah Vihear',
            'Pursat',
            'Prey Veng',
            'Ratanakiri',
            'Siem Reap',
            'Stung Treng',
            'Svay Rieng',
            'Takeo',
            'Tboung Khmum',
        ];

        foreach ($provinces as $province) {
            State::create(['name' => $province]);
        }
    }
}
