<?php

namespace Database\Seeders;

use App\Models\Proyek;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProyekSeeder extends Seeder
{
    public function run()
    {
        // Matikan sementara foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('units')->truncate();
        DB::table('proyeks')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Buat 5 proyek
        Proyek::factory(5)->create()->each(function ($proyek) {
            for ($i = 1; $i <= 10; $i++) {
                $createdAt = Carbon::now()->subDays(rand(0, 6))->setTime(rand(8, 18), rand(0, 59));

                Unit::create([
                    'proyek_id' => $proyek->id,
                    'nama_unit' => 'Unit ' . $i,
                    'status' => fake()->randomElement(['tersedia', 'terjual', 'terjual', 'terjual']),
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);
            }
        });
    }
}