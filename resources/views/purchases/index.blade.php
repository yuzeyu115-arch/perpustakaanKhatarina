@extends('layouts.app')
@section('title', 'Riwayat Pembelian')
@section('content')
<div class="mb-10 flex justify-between items-end">
    <div>
        <h1 class="text-4xl font-bold text-slate-900 mb-2">Purchase History</h1>
        <p class="text-slate-500">Daftar transaksi pembelian buku digital.</p>
    </div>
    <a href="{{ route('purchases.create') }}" class="gradient-bg text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:scale-105 transition-transform">
        Beli Buku
    </a>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 text-slate-400 text-xs uppercase tracking-widest font-bold">
                <th class="px-8 py-5">Buku</th>
                <th class="px-8 py-5">Pembeli</th>
                <th class="px-8 py-5">Metode Bayar</th>
                <th class="px-8 py-5">Total Harga</th>
                <th class="px-8 py-5">Status</th>
                <th class="px-8 py-5 text-right">Tanggal</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($purchases as $purchase)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-8 py-5 font-bold text-slate-900">{{ $purchase->book->title }}</td>
                    <td class="px-8 py-5 font-semibold text-slate-700">{{ $purchase->member->name }}</td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1 bg-slate-100 text-slate-600 text-xs font-bold rounded-full">{{ $purchase->payment_method }}</span>
                    </td>
                    <td class="px-8 py-5 font-bold text-indigo-600">Rp {{ number_format($purchase->amount, 0, ',', '.') }}</td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-full border border-emerald-100">Lunas</span>
                    </td>
                    <td class="px-8 py-5 text-right text-sm text-slate-400">{{ $purchase->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-8 py-20 text-center text-slate-400">Belum ada transaksi pembelian.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
