@extends('layouts.app')
@section('title', 'Transaksi Pembelian')
@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-10">
        <h1 class="text-4xl font-bold text-slate-900">Checkout Buku</h1>
        <p class="text-slate-500">Selesaikan pembayaran untuk memiliki buku digital secara permanen.</p>
    </div>

    <form action="{{ route('purchases.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @csrf
        <div class="md:col-span-2 space-y-8">
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <h3 class="text-xl font-bold text-slate-900 mb-6">Informasi Transaksi</h3>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Buku</label>
                        <select name="book_id" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 outline-none">
                            @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }} - Rp {{ number_format($book->price, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Anggota</label>
                        <select name="member_id" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 outline-none">
                            @foreach($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->membership_id }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <h3 class="text-xl font-bold text-slate-900 mb-6">Metode Pembayaran</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <label class="relative flex flex-col items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:bg-slate-50 transition-all has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50">
                        <input type="radio" name="payment_method" value="Bank" class="hidden" checked>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <span class="font-bold text-slate-700">Bank</span>
                    </label>
                    <label class="relative flex flex-col items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:bg-slate-50 transition-all has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50">
                        <input type="radio" name="payment_method" value="QRIS" class="hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                        </svg>
                        <span class="font-bold text-slate-700">QRIS</span>
                    </label>
                    <label class="relative flex flex-col items-center p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:bg-slate-50 transition-all has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50">
                        <input type="radio" name="payment_method" value="Transfer" class="hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                        <span class="font-bold text-slate-700">Transfer</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-indigo-600 rounded-3xl p-8 text-white shadow-xl shadow-indigo-100">
                <h3 class="text-xl font-bold mb-6">Ringkasan Order</h3>
                <div class="space-y-4 mb-8">
                    <div class="flex justify-between text-indigo-100">
                        <span>Harga Buku</span>
                        <span class="font-bold text-white">Rp --</span>
                    </div>
                    <div class="flex justify-between text-indigo-100 border-t border-indigo-500 pt-4 mt-4">
                        <span class="text-lg">Total</span>
                        <span class="text-2xl font-bold text-white">Rp --</span>
                    </div>
                </div>
                <button type="submit" class="w-full bg-white text-indigo-600 py-4 rounded-2xl font-bold hover:bg-indigo-50 transition-colors shadow-lg">
                    Bayar Sekarang
                </button>
            </div>
            <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                <p class="text-xs text-slate-400 leading-relaxed italic">
                    *Pastikan data anggota dan buku sudah benar sebelum melakukan pembayaran. Akses baca online akan diberikan segera setelah pembayaran lunas.
                </p>
            </div>
        </div>
    </form>
</div>
@endsection
