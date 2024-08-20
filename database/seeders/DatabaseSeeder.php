<?php

namespace Database\Seeders;

use App\Models\masters\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {

    $this->call([
      CategorySeeder::class,
      UserSeeder::class,
      LokasiSudinSeeder::class,
      JenisUnitUsahaSeeder::class,
      RolePermissionSeeder::class,
    ]);
  }
}
