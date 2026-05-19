@extends('layouts.app')
@section('title', 'Ubah Anggota')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-10">
        <a href="{{ route('members.index') }}" class="inline-flex items-center text-slate-500 hover:text-indigo-600 transition-colors mb-4 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Anggota
        </a>
        <h1 class="text-4xl font-bold text-slate-900">Ubah Anggota</h1>
        <p class="text-slate-500">Perbarui informasi anggota <span class="font-bold text-indigo-600">"{{ $member->name }}"</span>.</p>
    </div>

    <form action="{{ route('members.update', $member->id) }}" method="POST" class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">ID Anggota (Membership ID)</label>
                <input type="text" name="membership_id" value="{{ old('membership_id', $member->membership_id) }}" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none @error('membership_id') border-red-500 @enderror">
                @error('membership_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $member->name) }}" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none @error('name') border-red-500 @enderror">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $member->email) }}" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none @error('email') border-red-500 @enderror">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $member->phone) }}" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none @error('phone') border-red-500 @enderror">
                    @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Alamat</label>
                <textarea name="address" rows="3" class="w-full px-5 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none @error('address') border-red-500 @enderror">{{ old('address', $member->address) }}</textarea>
                @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="mt-10">
            <button type="submit" class="w-full gradient-bg text-white py-4 rounded-2xl font-bold shadow-xl shadow-indigo-100 hover:scale-[1.02] transition-transform text-lg flex items-center justify-center gap-2">
                Perbarui Anggota
            </button>
        </div>
    </form>
</div>
@endsection
