<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kelola Pelatihan';
        $pelatihan = Pelatihan::all();
        return view('be.pelatihan.index', compact('pelatihan', 'title'));
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
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'pelatihan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:120',
            'hari' => 'required|string|max:255',
            'jenis' => 'required|string',
            'ruangan' => 'required|string|max:255',
            'start' => 'required|date_format:H:i',  // Validasi waktu mulai
            'end' => 'required|date_format:H:i',    // Validasi waktu selesai
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
        ]);

        // Menyimpan foto
        if ($foto = $request->file('foto')) {
            $destinationPath = public_path('img/pelatihan');
            $fotoName = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $fotoName);
            $validatedData['foto'] = $fotoName;
        }

        Pelatihan::create($validatedData);

        return redirect()->route('pelatihanbe.index')->with('sukses', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Kelola Pelatihan';
        $pelatihan = Pelatihan::findOrFail($id);
        return view('be.pelatihan.edit', compact('pelatihan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelatihan = Pelatihan::find($id);

        $input = $request->all();

        // Cek apakah ada file foto yang dikirimkan dalam request
        if ($image = $request->file('foto')) {
            // Hapus foto lama jika ada
            if ($pelatihan->foto) {
                $oldImagePath = public_path('img/pelatihan/') . $pelatihan->foto;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan foto baru
            $destinationPath = 'img/pelatihan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = $profileImage;
        } else {
            unset($input['foto']);
        }

        // Update data pelatihan dari request
        $pelatihan->update($input);

        return redirect()->route('pelatihanbe.index')->with('sukses', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $pelatihan = Pelatihan::findOrFail($id); // Pastikan pelatihan ditemukan

            $gambarPath = public_path('img/pelatihan/' . $pelatihan->foto);

            if (is_file($gambarPath)) {
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                    Log::info('File berhasil dihapus: ' . $gambarPath);
                } else {
                    Log::warning('File tidak ditemukan: ' . $gambarPath);
                }
            } else {
                Log::warning('Path bukan file: ' . $gambarPath);
            }

            $pelatihan->delete();
            Log::info('pelatihan berhasil dihapus: ID ' . $id);

            return redirect()->route('pelatihanbe.index')->with('sukses', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error menghapus data: ' . $e->getMessage());
            return redirect()->route('pelatihanbe.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
