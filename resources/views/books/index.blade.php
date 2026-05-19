@extends('layouts.app')

@section('title', 'Katalog Buku')

@section('content')
<div class="mb-10 text-center flex flex-col items-center justify-center">
    <h1 class="text-4xl font-bold text-slate-900 mb-2">Perpustakaan ITSK RS dr. Soepraoen Malang</h1>
    <p class="text-slate-500">Kelola koleksi buku digital Anda dengan mudah dan modern.</p>
</div>

<!-- FEATURED BOOKS (Dari Foto yang Diupload) -->
<div class="mb-12 bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
    <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
        </svg>
        Buku Pilihan Bulan Ini
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Buku 1: Broken Home -->
        <div class="flex flex-col md:flex-row gap-6 bg-slate-50 rounded-2xl p-6 hover:shadow-md transition-shadow border border-slate-100">
            <div class="w-full md:w-48 h-64 flex-shrink-0 bg-slate-200 rounded-xl overflow-hidden shadow-inner">
                <img src="{{ asset('covers/broken-home.jpg') }}" alt="Broken Home" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/400x600/e2e8f0/64748b?text=Broken+Home'">
            </div>
            <div class="flex flex-col justify-center">
                <span class="text-xs font-bold uppercase tracking-wider text-indigo-600 mb-2">Novel / Fiksi</span>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Broken Home</h3>
                <p class="text-slate-600 mb-4">Karya: Ma'ma Mamajad, S.Pd, M.Pd.</p>
                <p class="text-sm text-slate-500 mb-6 line-clamp-3">Sebuah kisah menyentuh yang mengangkat realita kehidupan keluarga yang retak dan bagaimana seorang anak berjuang di tengah bayang-bayang trauma.</p>
                <div class="mt-auto">
                    <button onclick="alert('Database belum terhubung (Drive C Penuh). Silakan perbaiki terlebih dahulu.')" class="bg-indigo-600 text-white px-6 py-2 rounded-xl font-medium hover:bg-indigo-700 transition-colors shadow-sm w-fit">Pinjam Buku</button>
                </div>
            </div>
        </div>

        <!-- Buku 2: Broken Strings -->
        <div class="flex flex-col md:flex-row gap-6 bg-slate-50 rounded-2xl p-6 hover:shadow-md transition-shadow border border-slate-100">
            <div class="w-full md:w-48 h-64 flex-shrink-0 bg-slate-200 rounded-xl overflow-hidden shadow-inner">
                <img src="{{ asset('covers/broken-strings.jpg') }}" alt="Broken Strings" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/400x600/e2e8f0/64748b?text=Broken+Strings'">
            </div>
            <div class="flex flex-col justify-center">
                <span class="text-xs font-bold uppercase tracking-wider text-purple-600 mb-2">Memoir / Biografi</span>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Broken Strings</h3>
                <p class="text-slate-600 mb-4">Karya: Aurélie Moeremans</p>
                <p class="text-sm text-slate-500 mb-6 line-clamp-3">Kepingan Masa Muda yang Patah. Memoir perjalanan hidup yang menginspirasi tentang bangkit dari keterpurukan dan menyusun kembali kepingan harapan.</p>
                <div class="mt-auto">
                    <button onclick="alert('Database belum terhubung (Drive C Penuh). Silakan perbaiki terlebih dahulu.')" class="bg-purple-600 text-white px-6 py-2 rounded-xl font-medium hover:bg-purple-700 transition-colors shadow-sm w-fit">Pinjam Buku</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-6 text-sm text-slate-500 bg-yellow-50 p-4 rounded-xl border border-yellow-200 flex gap-3 items-start">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <p>
            <strong class="text-yellow-700">Info:</strong> Untuk menampilkan cover asli dari foto yang Anda kirim, 
            simpan foto tersebut dengan nama <code class="bg-yellow-200 px-1 rounded text-yellow-800">broken-home.jpg</code> dan <code class="bg-yellow-200 px-1 rounded text-yellow-800">broken-strings.jpg</code> ke dalam folder <code class="bg-yellow-200 px-1 rounded text-yellow-800">public/covers/</code> di project Anda.
        </p>
    </div>
</div>

<h2 class="text-2xl font-bold text-slate-800 mb-6 mt-12 flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
    </svg>
    Semua Koleksi Buku
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
    @forelse($books as $book)
        <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100 flex flex-col">
            <div class="relative h-72 overflow-hidden">
                @if($book->cover)
                    <img src="{{ asset('covers/' . $book->cover) }}" alt="{{ $book->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                @else
                    <div class="w-full h-full bg-slate-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                @endif
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 bg-white/90 backdrop-blur text-xs font-bold uppercase tracking-wider rounded-full text-indigo-600 shadow-sm">
                        {{ $book->category }}
                    </span>
                </div>
            </div>
            
            <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-xl font-bold text-slate-900 mb-1 group-hover:text-indigo-600 transition-colors line-clamp-1">{{ $book->title }}</h3>
                <p class="text-slate-500 text-sm mb-4">Oleh <span class="font-medium text-slate-700">{{ $book->author }}</span></p>
                
                <div class="flex items-center gap-4 text-xs text-slate-400 mb-6 mt-auto">
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        {{ $book->publisher }}
                    </span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 3V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $book->year }}
                    </span>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('books.show', $book->id) }}" class="flex-1 text-center py-2 bg-indigo-50 text-indigo-600 rounded-xl font-semibold hover:bg-indigo-100 transition-colors">Detail</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="p-2 bg-slate-50 text-slate-600 rounded-xl hover:bg-slate-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition-colors" onclick="return confirm('Yakin ingin menghapus buku ini?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full py-20 text-center">
            <div class="bg-white rounded-3xl p-12 shadow-sm border border-slate-100 inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-slate-200 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Belum ada koleksi</h3>
                <p class="text-slate-500 mb-6">Mulai tambahkan buku pertama Anda ke perpustakaan digital.</p>
                <a href="{{ route('books.create') }}" class="gradient-bg text-white px-8 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-100 inline-block hover:scale-105 transition-transform">Tambah Buku</a>
            </div>
        </div>
    @endforelse
</div>
@endsection
