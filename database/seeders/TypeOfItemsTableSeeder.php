<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeOfItem;

class TypeOfItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data jenis barang
        $types = [
            ['type_name' => 'Konsumsi'],
            ['type_name' => 'Pembersih']
        ];

        foreach ($types as $type) {
            TypeOfItem::create($type);
        }
    }
}
