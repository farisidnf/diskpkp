<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\LokasiSudin;
use Carbon\Carbon;

class LokasiSudinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "lokasi" => "Jakarta Pusat",
                'updated_by' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                "lokasi" => "Jakarta Barat",
                'updated_by' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                "lokasi" => "Jakarta Utara",
                'updated_by' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                "lokasi" => "Jakarta Selatan",
                'updated_by' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                "lokasi" => "Jakarta Timur",
                'updated_by' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                "lokasi" => "Kepulauan 1000",
                'updated_by' => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ];

        LokasiSudin::insert($data);
    }
}
