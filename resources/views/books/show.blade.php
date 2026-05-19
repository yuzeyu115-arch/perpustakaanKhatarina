@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-10">
        <a href="{{ route('books.index') }}" class="inline-flex items-center text-slate-500 hover:text-indigo-600 transition-colors mb-4 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Katalog
        </a>
    </div>

    <div class="bg-white rounded-[3rem] p-8 md:p-12 shadow-sm border border-slate-100 overflow-hidden relative">
        <!-- Decorative Gradient -->
        <div class="absolute top-0 right-0 w-64 h-64 gradient-bg opacity-5 blur-[100px] -mr-32 -mt-32"></div>
        
        <div class="flex flex-col md:flex-row gap-12 relative z-10">
            <!-- Book Cover -->
            <div class="w-full md:w-1/3">
                <div class="rounded-3xl overflow-hidden shadow-2xl border border-slate-200 aspect-[3/4]">
                    @if($book->cover)
                        <img src="{{ asset('covers/' . $book->cover) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Book Info -->
            <div class="w-full md:w-2/3">
                <span class="px-4 py-1.5 bg-indigo-50 text-indigo-600 text-xs font-bold uppercase tracking-widest rounded-full mb-6 inline-block">
                    {{ $book->category }}
                </span>
                <h1 class="text-5xl font-extrabold text-slate-900 mb-4 leading-tight">{{ $book->title }}</h1>
                <p class="text-xl text-slate-500 mb-8">Ditulis oleh <span class="text-slate-900 font-semibold">{{ $book->author }}</span></p>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-8 mb-10 p-6 bg-slate-50 rounded-3xl border border-slate-100">
                    <div>
                        <p class="text-xs text-slate-400 uppercase font-bold tracking-wider mb-1">Penerbit</p>
                        <p class="text-lg text-slate-800 font-medium">{{ $book->publisher }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 uppercase font-bold tracking-wider mb-1">Tahun Terbit</p>
                        <p class="text-lg text-slate-800 font-medium">{{ $book->year }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 uppercase font-bold tracking-wider mb-1">Harga</p>
                        <p class="text-lg text-indigo-600 font-bold">@if($book->price > 0) Rp {{ number_format($book->price, 0, ',', '.') }} @else Gratis @endif</p>
                    </div>
                </div>

                <div class="mb-10">
                    <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                        Sinopsis Buku
                    </h3>
                    <p class="text-slate-600 leading-relaxed text-lg whitespace-pre-line">{{ $book->description }}</p>
                </div>

                <div class="flex flex-wrap gap-4">
                    @if($book->file)
                        <a href="{{ route('books.read', $book->id) }}" class="px-8 py-4 gradient-bg text-white rounded-2xl font-bold shadow-xl shadow-indigo-100 hover:scale-105 transition-all flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Baca Online
                        </a>
                    @endif
                    <a href="{{ route('books.edit', $book->id) }}" class="px-8 py-4 bg-indigo-50 text-indigo-600 rounded-2xl font-bold hover:bg-indigo-100 transition-all flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-8 py-4 bg-white text-red-600 border border-red-100 rounded-2xl font-bold hover:bg-red-50 transition-all flex items-center gap-2" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini dari koleksi?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Hapus Koleksi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
