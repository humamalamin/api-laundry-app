<?php

namespace Database\Seeders;

use App\Models\Promo;
use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shopID5 = Shop::where('name', 'Luxury Grey')->first()->id;
        $shopID9 = Shop::where('name','Undercover Set')->first()->id;
        $promos = [
            [
                'image' => 'luxury grey.jpg',
                'shop_id' => $shopID5,
                'old_price' => 19000,
                'new_price' => 15000,
                'description' => 'Promo Flash Sales Idul Fitri',
            ],
            [
                'image' => 'undercover set.jpg',
                'shop_id' => $shopID9,
                'old_price' => 19000,
                'new_price' => 15000,
                'description' => 'Promo Flash Sales Idul Fitri',
            ],
        ];

        foreach ($promos as $promoItem) {
            Promo::create($promoItem);
        }
    }
}
