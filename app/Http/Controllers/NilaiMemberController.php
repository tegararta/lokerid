<?php

namespace App\Http\Controllers;

use App\Models\NilaiMember;
use Illuminate\Http\Request;
use App\Models\Daftarpelatihan;

class NilaiMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {

        
        // $nilaiMembers = NilaiMember::with(['pelatihan', 'member'])->get();
        // Pesan sukses
        $data = Daftarpelatihan::where('id_member', $id)->first();
        return view('instruktur.sertifikat.inputnilai', compact('data'));
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
    $request->validate([
        'id_member' => 'required|exists:members,id',
        'id_pelatihan' => 'required|exists:pelatihans,id',
        'kelas' => 'required',
        'nilai' => 'required|numeric',
        'jenispelatihan' => 'required',
    ]);

    // Simpan nilai ke database
    NilaiMember::create([
        'id_member' => $request->id_member,
        'id_pelatihan' => $request->id_pelatihan,
        'kelas' => $request->kelas,
        'nilai' => $request->nilai,
        'jenispelatihan' => $request->jenispelatihan,
    ]);

    return redirect()->route('sertifikat.pilih')->with('success', 'Sertifikat & Nilai berhasil disimpan.');
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
