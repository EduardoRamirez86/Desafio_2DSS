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
            // 🥤 Bebidas
            [
                'category_id' => 1,
                'nombre' => 'Coca-Cola 500ml',
                'precio' => 1.50,
                'stock' => 100,
                'image_url' => 'https://walmartni.vtexassets.com/arquivos/ids/329501/Gaseosa-Coca-Cola-regular-500-ml-2-7638.jpg?v=638392773814230000',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 1,
                'nombre' => 'Agua Evian 1L',
                'precio' => 1.20,
                'stock' => 120,
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWZ_ckGPGsEvoeII8unYlStcwMkvHGVnRYtQ&s',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 1,
                'nombre' => 'Red Bull Energy Drink',
                'precio' => 2.00,
                'stock' => 80,
                'image_url' => 'https://kip.sv/_next/image?url=https%3A%2F%2Ffenix.kip.sv%2Fwp-content%2Fuploads%2Fproducts%2Fbebida-energizante-red-bull-162126-1.png&w=3840&q=50',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 1,
                'nombre' => 'Jugo de Naranja Tropicana',
                'precio' => 1.70,
                'stock' => 90,
                'image_url' => 'https://i5.walmartimages.com/seo/Tropicana-Original-No-Pulp-100-Orange-Juice-52-fl-oz-Fruit-Juice_0016c688-2760-4999-9a84-9541cff9f53b_1.f20ed45dad56d11f938740c97988c2a1.jpeg',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 🍪 Snacks
            [
                'category_id' => 2,
                'nombre' => 'Pringles Original',
                'precio' => 2.50,
                'stock' => 70,
                'image_url' => 'https://walmartsv.vtexassets.com/arquivos/ids/658004/44888_01.jpg?v=638719472535200000',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 2,
                'nombre' => 'Cheetos Crunchy',
                'precio' => 1.80,
                'stock' => 90,
                'image_url' => 'https://siman.vtexassets.com/arquivos/ids/771254-800-800?v=637313340786600000&width=800&height=800&aspect=true',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 2,
                'nombre' => 'Barra de Granola Nature Valley',
                'precio' => 1.50,
                'stock' => 110,
                'image_url' => 'https://distribuidoramorazan.com/web/image/product.template/807/image?unique=89f4d18',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 2,
                'nombre' => 'Galletas Oreo',
                'precio' => 1.00,
                'stock' => 100,
                'image_url' => 'https://www.costco.com.mx/medias/sys_master/products/hd0/h3d/61769842163742.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 🍨 Postres
            [
                'category_id' => 3,
                'nombre' => 'Ben & Jerry\'s Chocolate Fudge Brownie',
                'precio' => 3.80,
                'stock' => 60,
                'image_url' => 'https://i5.walmartimages.com/seo/Ben-Jerry-s-Chocolate-Fudge-Brownie-Ice-Cream-Kosher-Milk-Cage-Free-Eggs-1-Pint-1-Count_bccfb5ef-721c-4f65-a755-b6d04edb3628.6bc40172f144dff0cad1cfc5944694b0.jpeg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 3,
                'nombre' => 'Pastel de Fresa',
                'precio' => 2.50,
                'stock' => 40,
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0KeYaTBSPgwTOXCKhS3uK4yOiBkotmgQSxQ&s',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 3,
                'nombre' => 'Helado de Vainilla',
                'precio' => 2.20,
                'stock' => 50,
                'image_url' => 'https://www.laneveria.com.sv/wp-content/uploads/2017/05/1-litro-vainilla-600x600.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 3,
                'nombre' => 'Tarta de Chocolate',
                'precio' => 3.00,
                'stock' => 30,
                'image_url' => 'https://sgfm.elcorteingles.es/SGFM/dctm/MEDIA03/202401/15/00118955802113____1__600x600.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

    }
}
