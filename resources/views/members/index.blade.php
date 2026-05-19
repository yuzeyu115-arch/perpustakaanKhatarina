@extends('layouts.app')
@section('title', 'Data Anggota')
@section('content')
<div class="mb-10 flex justify-between items-end">
    <div>
        <h1 class="text-4xl font-bold text-slate-900 mb-2">Library Members</h1>
        <p class="text-slate-500">Kelola data anggota perpustakaan digital Anda.</p>
    </div>
    <a href="{{ route('members.create') }}" class="gradient-bg text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:scale-105 transition-transform">
        Tambah Anggota
    </a>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 text-slate-400 text-xs uppercase tracking-widest font-bold">
                <th class="px-8 py-5">ID Anggota</th>
                <th class="px-8 py-5">Nama Lengkap</th>
                <th class="px-8 py-5">Kontak</th>
                <th class="px-8 py-5">Alamat</th>
                <th class="px-8 py-5 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($members as $member)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-8 py-5 font-bold text-indigo-600">{{ $member->membership_id }}</td>
                    <td class="px-8 py-5 font-semibold text-slate-900">{{ $member->name }}</td>
                    <td class="px-8 py-5">
                        <div class="text-sm text-slate-600">{{ $member->email }}</div>
                        <div class="text-xs text-slate-400">{{ $member->phone }}</div>
                    </td>
                    <td class="px-8 py-5 text-sm text-slate-500 max-w-xs truncate">{{ $member->address }}</td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('members.edit', $member->id) }}" class="p-2 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition-colors" onclick="return confirm('Hapus anggota ini?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center text-slate-400">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
