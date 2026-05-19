<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = \App\Models\Book::latest()->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        if ($request->has('price')) {
            $request->merge([
                'price' => $request->price ? str_replace('.', '', $request->price) : null,
            ]);
        }

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|date',
            'category' => 'required',
            'description' => 'required',
            'price' => 'nullable|numeric',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file' => 'nullable|mimes:pdf|max:10000',
        ]);

        $input = $request->all();
        $input['year'] = date('Y', strtotime($request->year));

        if ($image = $request->file('cover')) {
            $destinationPath = 'covers/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['cover'] = "$profileImage";
        }

        if ($file = $request->file('file')) {
            $destinationPath = 'book_pdfs/';
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['file'] = "$fileName";
        }

        \App\Models\Book::create($input);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(\App\Models\Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(\App\Models\Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, \App\Models\Book $book)
    {
        if ($request->has('price')) {
            $request->merge([
                'price' => $request->price ? str_replace('.', '', $request->price) : null,
            ]);
        }

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|date',
            'category' => 'required',
            'description' => 'required',
            'price' => 'nullable|numeric',
        ]);

        $input = $request->all();
        $input['year'] = date('Y', strtotime($request->year));

        if ($image = $request->file('cover')) {
            $request->validate(['cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']);
            $destinationPath = 'covers/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['cover'] = "$profileImage";
            if ($book->cover && file_exists(public_path('covers/' . $book->cover))) {
                unlink(public_path('covers/' . $book->cover));
            }
        }

        if ($file = $request->file('file')) {
            $request->validate(['file' => 'required|mimes:pdf|max:10000']);
            $destinationPath = 'book_pdfs/';
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['file'] = "$fileName";
            if ($book->file && file_exists(public_path('book_pdfs/' . $book->file))) {
                unlink(public_path('book_pdfs/' . $book->file));
            }
        }

        $book->update($input);

        return redirect()->route('books.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy(\App\Models\Book $book)
    {
        if ($book->cover && file_exists(public_path('covers/' . $book->cover))) {
            unlink(public_path('covers/' . $book->cover));
        }
        if ($book->file && file_exists(public_path('book_pdfs/' . $book->file))) {
            unlink(public_path('book_pdfs/' . $book->file));
        }
        $book->delete();
        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }

    public function read(\App\Models\Book $book)
    {
        if (!$book->file) {
            return redirect()->back()->with('error', 'Buku ini tidak memiliki file digital.');
        }
        return view('books.read', compact('book'));
    }
}
