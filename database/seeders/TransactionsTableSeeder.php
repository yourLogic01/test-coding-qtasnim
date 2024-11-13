<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Item;
use Carbon\Carbon;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil ID barang berdasarkan nama
        $kopi = Item::where('item_name', 'Kopi')->first()->id;
        $teh = Item::where('item_name', 'Teh')->first()->id;
        $pastaGigi = Item::where('item_name', 'Pasta Gigi')->first()->id;
        $sabunMandi = Item::where('item_name', 'Sabun Mandi')->first()->id;
        $sampo = Item::where('item_name', 'Sampo')->first()->id;

        // Data transaksi
        $transactions = [
            ['item_id' => $kopi, 'quantity_sold' => 10, 'transaction_date' => Carbon::parse('2021-05-01')],
            ['item_id' => $teh, 'quantity_sold' => 19, 'transaction_date' => Carbon::parse('2021-05-05')],
            ['item_id' => $kopi, 'quantity_sold' => 15, 'transaction_date' => Carbon::parse('2021-05-10')],
            ['item_id' => $pastaGigi, 'quantity_sold' => 20, 'transaction_date' => Carbon::parse('2021-05-11')],
            ['item_id' => $sabunMandi, 'quantity_sold' => 30, 'transaction_date' => Carbon::parse('2021-05-11')],
            ['item_id' => $sampo, 'quantity_sold' => 25, 'transaction_date' => Carbon::parse('2021-05-12')],
            ['item_id' => $teh, 'quantity_sold' => 5, 'transaction_date' => Carbon::parse('2021-05-12')],
        ];

        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
}
