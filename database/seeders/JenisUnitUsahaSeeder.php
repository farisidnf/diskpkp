<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\JenisUnitUsaha;
use Carbon\Carbon;

class JenisUnitUsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "nama" => "Gudang Berpendingin",
                'updated_by' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                "nama" => "Gudang Kering",
                'updated_by' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                "nama" => "Ritel",
                'updated_by' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                "nama" => "Kios Daging",
                'updated_by' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                "nama" => "Unit Pengolahan Daging",
                'updated_by' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ];

        JenisUnitUsaha::insert($data);
    }
}
