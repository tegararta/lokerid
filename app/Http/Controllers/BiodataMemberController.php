<?php

namespace App\Http\Controllers;

use App\Models\BiodataMember;
use App\Models\Instruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BiodataMemberController extends Controller
{
    // Menampilkan semua biodata member
    public function index()
    {
        $memberId = auth('member')->id();

        // Mengambil data BiodataMember beserta data pelatihan terkait
        $memberBiodata = BiodataMember::with(['member.daftarpelatihan.pelatihan.instrukturs'])
            ->where('id_member', $memberId)
            ->first();

        $instruktur = $memberBiodata->member->daftarpelatihan
            ->map(function ($daftar) {
                return $daftar->pelatihan->instrukturs;
            })->flatten();

        return view('fe.profil.dataUser.index', compact('memberBiodata', 'instruktur'));
    }

    // Menampilkan form untuk menambahkan member baru
    public function create()
    {
        return view('biodata_members.create');
    }

    // Menyimpan data member baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_member' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'usia' => 'required|integer',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload file foto
        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
        }

        // Simpan data ke database
        BiodataMember::create([
            'id_member' => $request->id_member,
            'nama' => $request->nama,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $fileName, // Nama file foto
        ]);

        return redirect()->route('biodata_members.index')->with('success', 'Data member berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit member
    public function edit($id)
    {
        $member = BiodataMember::findOrFail($id);
        return view('biodata_members.edit', compact('member'));
    }

    // Mengupdate data member
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_member' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'usia' => 'required|integer',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $member = BiodataMember::findOrFail($id);

        // Update file foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($member->foto && file_exists(public_path('uploads/' . $member->foto))) {
                unlink(public_path('uploads/' . $member->foto));
            }

            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $member->foto = $fileName;
        }

        // Update data lainnya
        $member->update([
            'id_member' => $request->id_member,
            'nama' => $request->nama,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('biodata_members.index')->with('success', 'Data member berhasil diperbarui.');
    }

    // Menghapus data member
    public function destroy($id)
    {
        $member = BiodataMember::findOrFail($id);

        // Hapus foto dari server
        if ($member->foto && file_exists(public_path('uploads/' . $member->foto))) {
            unlink(public_path('uploads/' . $member->foto));
        }

        $member->delete();

        return redirect()->route('biodata_members.index')->with('success', 'Data member berhasil dihapus.');
    }
}
