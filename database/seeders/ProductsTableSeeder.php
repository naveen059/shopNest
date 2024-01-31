<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'image' => 'images/cloth1.png',
                'title' => 'Stylish Cotton Shirt',
                'description' => 'Upgrade your wardrobe with this stylish cotton shirt. Perfect for any casual or semi-formal occasion.',
                'lastUpdated' => now(),
                'price' => '29.99',
            ],
            [
                'image' => 'images/cloth2.png',
                'title' => 'Comfortable Jeans',
                'description' => 'Stay comfortable all day long with these high-quality denim jeans. A must-have for your casual collection.',
                'lastUpdated' => now(),
                'price' => '22.54',
            ],
            [
                'image' => 'images/cloth3.png',
                'title' => 'Elegant Dress',
                'description' => 'Step out in style with this elegant dress. Perfect for special occasions and evening events.',
                'lastUpdated' => now(),
                'price' => '56.4',
            ],
            [
                'image' => 'images/cloth5.png',
                'title' => 'Jacket',
                'description' => 'Step out in style with this Jacket. Perfect for cold and chill weathers.',
                'lastUpdated' => now(),
                'price' => '107.43',
            ],
            [
                'image' => 'images/cloth4.png',
                'title' => 'Summer Dress',
                'description' => 'Look Elegant and fancy. Wear summer Dress for Summers.',
                'lastUpdated' => now(),
                'price' => '78.99',
            ],
        ];

        foreach ($products as &$product) {
            $product['lastUpdated'] = $this->getFormattedLastUpdated($product['lastUpdated']);
        }

        DB::table('products')->insert($products);
    }

    private function getFormattedLastUpdated($timestamp)
    {
        $carbonTimestamp = Carbon::parse($timestamp);
        $diff = $carbonTimestamp->diffForHumans();

        return 'Last updated ' . $diff;
    }
}
