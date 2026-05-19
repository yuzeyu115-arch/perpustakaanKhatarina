@extends('layouts.app')

@section('title', 'Ubah Data Buku')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-10">
        <a href="{{ route('books.index') }}" class="inline-flex items-center text-slate-500 hover:text-indigo-600 transition-colors mb-4 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Katalog
        </a>
        <h1 class="text-4xl font-bold text-slate-900">Ubah Data Buku</h1>
        <p class="text-slate-500">Perbarui informasi buku <span class="font-bold text-indigo-600">"{{ $book->title }}"</span>.</p>
    </div>

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Judul Buku</label>
                <input type="text" name="title" value="{{ old('title', $book->title) }}" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('title') border-red-500 @enderror">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Penulis</label>
                <input type="text" name="author" value="{{ old('author', $book->author) }}" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('author') border-red-500 @enderror">
                @error('author') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Penerbit</label>
                <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('publisher') border-red-500 @enderror">
                @error('publisher') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Tahun Terbit</label>
                <input type="date" name="year" value="{{ old('year', $book->year ? $book->year . '-01-01' : '') }}" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('year') border-red-500 @enderror">
                @error('year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Harga Jual (Opsional)</label>
                <div class="relative flex items-center">
                    <span class="absolute left-5 text-slate-400 font-bold">Rp</span>
                    <input type="text" name="price" id="price-input" value="{{ old('price', $book->price) }}" class="w-full pl-12 pr-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('price') border-red-500 @enderror">
                </div>
                @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                <select name="category" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('category') border-red-500 @enderror">
                    <option value="Teknologi" {{ old('category', $book->category) == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                    <option value="Fiksi" {{ old('category', $book->category) == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                    <option value="Bisnis" {{ old('category', $book->category) == 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
                    <option value="Sains" {{ old('category', $book->category) == 'Sains' ? 'selected' : '' }}>Sains</option>
                    <option value="Lainnya" {{ old('category', $book->category) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">File Buku Digital (PDF) - Ganti jika perlu</label>
                <input type="file" name="file" accept="application/pdf" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 outline-none">
                @if($book->file)
                    <p class="text-xs text-emerald-600 mt-1">Sudah ada file: {{ $book->file }}</p>
                @endif
                @error('file') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Buku</label>
                <textarea name="description" rows="4" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('description') border-red-500 @enderror">{{ old('description', $book->description) }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Ganti Cover (Opsional)</label>
                <div class="flex gap-6 items-start">
                    <div class="w-32 h-44 rounded-2xl overflow-hidden shadow-md flex-shrink-0 border border-slate-200">
                        @if($book->cover)
                            <img src="{{ asset('covers/' . $book->cover) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400 text-xs text-center p-2">Tidak ada cover</div>
                        @endif
                    </div>
                    <div class="flex-grow">
                        <label class="flex flex-col items-center justify-center w-full h-44 border-2 border-slate-200 border-dashed rounded-2xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Klik untuk ganti cover</span></p>
                                <p class="text-xs text-slate-400">PNG, JPG, JPEG (MAX. 2MB)</p>
                            </div>
                            <input type="file" name="cover" class="hidden" accept="image/*" />
                        </label>
                        @error('cover') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10">
            <button type="submit" class="w-full gradient-bg text-white py-4 rounded-2xl font-bold shadow-xl shadow-indigo-100 hover:scale-[1.02] transition-transform flex items-center justify-center gap-2 text-lg">
                Perbarui Data
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const priceInput = document.getElementById('price-input');
        if (priceInput) {
            // Function to format as thousands
            const formatNumber = (val) => {
                let cleanVal = String(val).replace(/\D/g, '');
                if (cleanVal !== '') {
                    return parseInt(cleanVal, 10).toLocaleString('id-ID');
                }
                return '';
            };

            // Format initial value
            if (priceInput.value) {
                priceInput.value = formatNumber(priceInput.value);
            }

            // Real-time formatter
            priceInput.addEventListener('input', function(e) {
                this.value = formatNumber(this.value);
            });
        }
    });
</script>
@endsection
