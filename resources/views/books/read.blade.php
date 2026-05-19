@extends('layouts.app')
@section('title', 'Membaca: ' . $book->title)
@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <a href="{{ route('books.show', $book->id) }}" class="text-slate-500 hover:text-indigo-600 transition-colors flex items-center gap-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Detail Buku
        </a>
        <h1 class="text-2xl font-bold text-slate-900">{{ $book->title }}</h1>
    </div>
    <div class="flex gap-4">
        <a href="{{ asset('book_pdfs/' . $book->file) }}" download class="px-5 py-2 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition-all flex items-center gap-2 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Download PDF
        </a>
    </div>
</div>

<div class="bg-slate-900 rounded-[2rem] overflow-hidden shadow-2xl relative h-[80vh]">
    <iframe src="{{ asset('book_pdfs/' . $book->file) }}" class="w-full h-full border-none"></iframe>
    
    <!-- Mobile Warning -->
    <div class="absolute inset-0 flex items-center justify-center bg-slate-900 text-white p-8 text-center md:hidden pointer-events-none">
        <p>Gunakan layar yang lebih besar untuk pengalaman membaca yang lebih baik atau download file PDF.</p>
    </div>
</div>
@endsection
