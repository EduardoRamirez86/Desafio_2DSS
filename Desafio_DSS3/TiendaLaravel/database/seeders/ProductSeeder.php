<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // Asume que las categorías ya existen con IDs 1 a 5
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'nombre'      => 'Refresco Cola 500ml',
                'precio'      => 1.50,
                'stock'       => 100,
                'image_url'   => '/images/refresco_cola.jpg',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'category_id' => 1,
                'nombre'      => 'Agua Mineral 1L',
                'precio'      => 0.90,
                'stock'       => 200,
                'image_url'   => '/images/agua_mineral.jpg',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'category_id' => 2,
                'nombre'      => 'Papas Fritas 120g',
                'precio'      => 1.20,
                'stock'       => 150,
                'image_url'   => '/images/papas_fritas.jpg',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'category_id' => 3,
                'nombre'      => 'Brownie Chocolate',
                'precio'      => 2.00,
                'stock'       => 50,
                'image_url'   => '/images/brownie.jpg',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'category_id' => 4,
                'nombre'      => 'Pan de Molde Integral',
                'precio'      => 1.80,
                'stock'       => 80,
                'image_url'   => '/images/pan_integral.jpg',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'category_id' => 5,
                'nombre'      => 'Helado Vainilla 1L',
                'precio'      => 3.50,
                'stock'       => 40,
                'image_url'   => '/images/helado_vainilla.jpg',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ]);
    }
}
