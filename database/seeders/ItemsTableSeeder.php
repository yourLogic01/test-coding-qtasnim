<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\TypeOfItem;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil ID jenis barang berdasarkan nama
        $konsumsi = TypeOfItem::where('type_name', 'Konsumsi')->first()->id;
        $pembersih = TypeOfItem::where('type_name', 'Pembersih')->first()->id;

        // Data barang
        $items = [
            ['item_name' => 'Kopi', 'stock' => 100, 'type_of_item_id' => $konsumsi],
            ['item_name' => 'Teh', 'stock' => 100, 'type_of_item_id' => $konsumsi],
            ['item_name' => 'Pasta Gigi', 'stock' => 100, 'type_of_item_id' => $pembersih],
            ['item_name' => 'Sabun Mandi', 'stock' => 100, 'type_of_item_id' => $pembersih],
            ['item_name' => 'Sampo', 'stock' => 100, 'type_of_item_id' => $pembersih],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
