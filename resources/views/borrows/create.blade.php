@extends('layouts.app')
@section('title', 'Input Peminjaman')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10">
        <h1 class="text-4xl font-bold text-slate-900">Form Peminjaman</h1>
        <p class="text-slate-500">Catat transaksi peminjaman buku untuk anggota.</p>
    </div>

    <form action="{{ route('borrows.store') }}" method="POST" class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
        @csrf
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Buku</label>
                <select name="book_id" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 outline-none">
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }} ({{ $book->author }})</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Pilih Anggota</label>
                <select name="member_id" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 outline-none">
                    @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }} - {{ $member->membership_id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal Pinjam</label>
                    <input type="date" name="borrow_date" value="{{ date('Y-m-d') }}" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Batas Pengembalian</label>
                    <input type="date" name="return_deadline" value="{{ date('Y-m-d', strtotime('+7 days')) }}" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 outline-none">
                </div>
            </div>
        </div>
        <div class="mt-10">
            <button type="submit" class="w-full gradient-bg text-white py-4 rounded-2xl font-bold shadow-xl shadow-indigo-100 hover:scale-[1.02] transition-transform text-lg">
                Catat Peminjaman
            </button>
        </div>
    </form>
</div>
@endsection
