@extends('layouts.app')
@section('title', 'Riwayat Peminjaman')
@section('content')
<div class="mb-10 flex justify-between items-end">
    <div>
        <h1 class="text-4xl font-bold text-slate-900 mb-2">Borrowing Records</h1>
        <p class="text-slate-500">Pantau status peminjaman dan pengembalian buku.</p>
    </div>
    <a href="{{ route('borrows.create') }}" class="gradient-bg text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:scale-105 transition-transform">
        Pinjam Buku
    </a>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 text-slate-400 text-xs uppercase tracking-widest font-bold">
                <th class="px-8 py-5">Buku</th>
                <th class="px-8 py-5">Peminjam</th>
                <th class="px-8 py-5">Tgl Pinjam</th>
                <th class="px-8 py-5">Deadline</th>
                <th class="px-8 py-5">Status</th>
                <th class="px-8 py-5 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($borrows as $borrow)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-8 py-5">
                        <div class="font-bold text-slate-900">{{ $borrow->book->title }}</div>
                        <div class="text-xs text-slate-400">{{ $borrow->book->category }}</div>
                    </td>
                    <td class="px-8 py-5 font-semibold text-slate-700">{{ $borrow->member->name }}</td>
                    <td class="px-8 py-5 text-sm text-slate-600">{{ $borrow->borrow_date }}</td>
                    <td class="px-8 py-5 text-sm text-slate-600 font-medium @if($borrow->status == 'borrowed' && now() > $borrow->return_deadline) text-red-500 @endif">{{ $borrow->return_deadline }}</td>
                    <td class="px-8 py-5">
                        @if($borrow->status == 'borrowed')
                            <span class="px-3 py-1 bg-amber-50 text-amber-600 text-xs font-bold rounded-full border border-amber-100">Dipinjam</span>
                        @else
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-xs font-bold rounded-full border border-emerald-100">Dikembalikan</span>
                        @endif
                    </td>
                    <td class="px-8 py-5 text-right">
                        @if($borrow->status == 'borrowed')
                            <form action="{{ route('borrows.return', $borrow->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors">Kembalikan Buku</button>
                            </form>
                        @else
                            <span class="text-slate-300 text-sm italic">Selesai</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-8 py-20 text-center text-slate-400">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
