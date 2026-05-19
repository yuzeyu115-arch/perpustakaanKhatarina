<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = \App\Models\Borrow::with(['book', 'member'])->latest()->get();
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        $books = \App\Models\Book::all();
        $members = \App\Models\Member::all();
        return view('borrows.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
            'member_id' => 'required',
            'borrow_date' => 'required|date',
            'return_deadline' => 'required|date|after:borrow_date',
        ]);

        \App\Models\Borrow::create($request->all());

        return redirect()->route('borrows.index')
            ->with('success', 'Peminjaman berhasil dicatat.');
    }

    public function returnBook(\App\Models\Borrow $borrow)
    {
        $borrow->update(['status' => 'returned']);
        return redirect()->route('borrows.index')
            ->with('success', 'Buku telah dikembalikan.');
    }
}
