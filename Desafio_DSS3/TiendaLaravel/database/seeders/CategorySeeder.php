<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('categories')->insert([
            ['nombre' => 'Bebidas', 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Snacks', 'created_at' => $now, 'updated_at' => $now],
            ['nombre' => 'Postres', 'created_at' => $now, 'updated_at' => $now],
        ]);

    }
}
