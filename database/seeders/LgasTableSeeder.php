<?php
namespace Database\Seeders;

use App\Models\Lga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LgasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('lgas')->delete();

        // Province IDs (1-25, where Phnom Penh is 14)
        $province_ids = [
            // Phnom Penh (ID: 14) - 12 Khans (districts)
            14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14,

            // Kampong Speu (ID: 5) - 8 districts
            5, 5, 5, 5, 5, 5, 5, 5,

            // ... (add other provinces as needed)
        ];

        $districts = [
            // Phnom Penh (Khans)
            'Chamkar Mon', 'Doun Penh', 'Prampir Meakkakra', 'Tuol Kouk', 'Dangkao', 'Mean Chey', 'Russey Keo', 'Sen Sok', 'Pur SenChey', 'Chroy Changvar', 'Prek Pnov', 'Chbar Ampov',

            // Kampong Speu
            'Basedth', 'Chbar Mon', 'Kong Pisei', 'Aoral', 'Odongk', 'Phnum Sruoch', 'Samraong Tong', 'Thpong',

            // ... (add other districts)
        ];

        for ($i = 0; $i < count($districts); $i++) {
            Lga::create([
                'state_id' => $province_ids[$i],
                'name'     => $districts[$i]
            ]);
        }
    }
}
