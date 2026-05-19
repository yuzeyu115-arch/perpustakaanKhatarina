<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = \App\Models\Member::latest()->get();
        return view('members.index', compact('members'));
    }

    public function show(\App\Models\Member $member)
    {
        $member->load(['borrows.book', 'purchases.book']);
        return view('members.show', compact('member'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'membership_id' => 'required|unique:members',
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'phone' => 'required',
            'address' => 'required',
        ]);

        \App\Models\Member::create($request->all());

        return redirect()->route('members.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(\App\Models\Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, \App\Models\Member $member)
    {
        $request->validate([
            'membership_id' => 'required|unique:members,membership_id,' . $member->id,
            'name' => 'required',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(\App\Models\Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
