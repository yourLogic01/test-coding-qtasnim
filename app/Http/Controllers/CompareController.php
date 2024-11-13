<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TypeofItem;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    // compare
    public function index(Request $request)
    {
        $comparison = $request->input('comparison', 'highest'); // Default is 'highest'

        // Ambil tanggal mulai dan akhir dari input atau set default jika tidak ada
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        // Get the total quantity sold per item type with date range filter
        $typeSales = Transaction::join('items', 'transactions.item_id', '=', 'items.id')
            ->join('type_of_items', 'items.type_of_item_id', '=', 'type_of_items.id')
            ->selectRaw('type_of_items.type_name, SUM(transactions.quantity_sold) as total_sold')
            ->whereBetween('transactions.transaction_date', [$startDate, $endDate]) // Filter by date range
            ->groupBy('type_of_items.id')
            ->orderBy('total_sold', $comparison === 'highest' ? 'desc' : 'asc')
            ->get();

        // Get all item types (optional, for displaying type options)
        $types = TypeofItem::all();

        // Pass start and end dates to the view
        return view('transactions.compare', compact('typeSales', 'types', 'comparison', 'startDate', 'endDate'));
    }
}
