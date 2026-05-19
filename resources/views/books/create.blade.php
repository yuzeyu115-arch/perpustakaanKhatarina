@extends('layouts.app')

@section('title', 'Tambah Buku Baru')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-10">
        <a href="{{ route('books.index') }}" class="inline-flex items-center text-slate-500 hover:text-indigo-600 transition-colors mb-4 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Katalog
        </a>
        <h1 class="text-4xl font-bold text-slate-900">Tambah Koleksi Baru</h1>
        <p class="text-slate-500">Lengkapi formulir di bawah untuk menambahkan buku ke sistem.</p>
    </div>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Judul Buku</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Pemrograman Laravel Modern" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('title') border-red-500 @enderror">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Penulis</label>
                <input type="text" name="author" value="{{ old('author') }}" placeholder="Nama penulis" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('author') border-red-500 @enderror">
                @error('author') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Penerbit</label>
                <input type="text" name="publisher" value="{{ old('publisher') }}" placeholder="Nama penerbit" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('publisher') border-red-500 @enderror">
                @error('publisher') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Tahun Terbit</label>
                <input type="date" name="year" value="{{ old('year') }}" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('year') border-red-500 @enderror">
                @error('year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Harga Jual (Opsional)</label>
                <div class="relative flex items-center">
                    <span class="absolute left-5 text-slate-400 font-bold">Rp</span>
                    <input type="text" name="price" id="price-input" value="{{ old('price', 0) }}" class="w-full pl-12 pr-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('price') border-red-500 @enderror">
                </div>
                @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                <select name="category" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('category') border-red-500 @enderror">
                    <option value="">Pilih Kategori</option>
                    <option value="Teknologi" {{ old('category') == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                    <option value="Fiksi" {{ old('category') == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                    <option value="Bisnis" {{ old('category') == 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
                    <option value="Sains" {{ old('category') == 'Sains' ? 'selected' : '' }}>Sains</option>
                    <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">File Buku Digital (PDF)</label>
                <input type="file" name="file" accept="application/pdf" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 outline-none">
                <p class="text-xs text-slate-400 mt-1">Upload file PDF untuk fitur baca online (Max 10MB).</p>
                @error('file') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Buku</label>
                <textarea name="description" rows="4" placeholder="Tuliskan ringkasan buku..." class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Cover Buku</label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col items-center justify-center w-full h-44 border-2 border-slate-200 border-dashed rounded-2xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                            <p class="text-xs text-slate-400">PNG, JPG, JPEG (MAX. 2MB)</p>
                        </div>
                        <input type="file" name="cover" class="hidden" accept="image/*" />
                    </label>
                </div>
                @error('cover') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mt-10">
            <button type="submit" class="w-full gradient-bg text-white py-4 rounded-2xl font-bold shadow-xl shadow-indigo-100 hover:scale-[1.02] transition-transform flex items-center justify-center gap-2 text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Simpan Buku
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
                let cleanVal = val.replace(/\D/g, '');
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
