<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = \App\Models\Purchase::with(['book', 'member'])->latest()->get();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $books = \App\Models\Book::where('price', '>', 0)->get();
        $members = \App\Models\Member::all();
        return view('purchases.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
            'member_id' => 'required',
            'payment_method' => 'required',
        ]);

        $book = \App\Models\Book::find($request->book_id);
        
        \App\Models\Purchase::create([
            'book_id' => $request->book_id,
            'member_id' => $request->member_id,
            'amount' => $book->price,
            'payment_method' => $request->payment_method,
            'status' => 'paid',
        ]);

        return redirect()->route('purchases.index')
            ->with('success', 'Pembelian berhasil menggunakan ' . $request->payment_method);
    }
}
