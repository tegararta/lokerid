<?php

namespace App\Http\Controllers;

use App\Models\NilaiMember;
use Illuminate\Http\Request;

class NilaiMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilaiMembers = NilaiMember::with(['pelatihan', 'member'])->get();
        return view('nilai_members.index', compact('nilaiMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nilai_members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pelatihan' => 'required|exists:pelatihans,id',
            'id_member' => 'required|exists:members,id',
            'jenispelatihan' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'nilai' => 'required|string|max:10',
        ]);

        NilaiMember::create($validatedData);

        return redirect()->route('instruktur.nilaipelatihan.index')->with('success', 'Nilai member berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NilaiMember $nilaiMember)
    {
        return view('nilai_members.edit', compact('nilaiMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NilaiMember $nilaiMember)
    {
        $validatedData = $request->validate([
            'id_pelatihan' => 'required|exists:pelatihans,id',
            'id_member' => 'required|exists:members,id',
            'jenispelatihan' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'nilai' => 'required|string|max:10',
        ]);

        $nilaiMember->update($validatedData);

        return redirect()->route('nilai_members.index')->with('success', 'Nilai member berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NilaiMember $nilaiMember)
    {
        $nilaiMember->delete();

        return redirect()->route('nilai_members.index')->with('success', 'Nilai member berhasil dihapus.');
    }
}
