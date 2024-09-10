<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Infopelatihan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class InfopelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Info Pelatihan';
        $user = User::all();
        $infopelatihan = Infopelatihan::all();
        return view('be.infopelatihan.index',compact('title','user','infopelatihan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari user
        $data = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|unique:infopelatihans,email,' . $request->id,
            'nip' => 'required|string|unique:infopelatihans,nip,' . $request->id,
            'hari' => 'required|string|max:255',
            'jam' => 'required',
            'jumlah' => 'required|integer',
            'modal' => 'required|numeric',
            'pelatihan' => 'required|string|max:255',
        ]);
    
        // Proses upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/infopelatihan'), $filename);
            $data['foto'] = 'img/infopelatihan/' . $filename;
        }
    
        // Simpan data lainnya ke database
        // Misalnya menggunakan model InfoPelatihan
        InfoPelatihan::create($data);
    
        // Redirect atau response sesuai kebutuhan
        return redirect()->route('infopel.index')->with('sukses', 'Data berhasil disimpan!');
    }
    

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil data pelatihan berdasarkan id
        // $pelatihan = Infopelatihan::find($id);
    
        // // Mengecek apakah data pelatihan ditemukan
        // if (!$pelatihan) {
        //     return redirect('/infopelatihan')->with('error', 'Pelatihan tidak ditemukan');
        // }
    
        // // Mengembalikan view dengan data pelatihan
        // return view('fe.infopelatihan.detail', compact('pelatihan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $infopelatihan = Infopelatihan::findOrFail($id);
    
        // Hapus foto dari storage
        if ($infopelatihan->foto) {
            Storage::disk('public')->delete($infopelatihan->foto);
        }
    
        // Hapus data dari database
        $infopelatihan->delete();
    
        return redirect(route('infopel.index'))->with('sukses', 'Data berhasil dihapus.');
    }
}
