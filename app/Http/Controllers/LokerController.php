<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kelola Loker';
        $loker = Loker::all();
        return view('be.loker.index',compact('loker','title'));
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
        $input = $request->all();

        // Pastikan yang diunggah adalah file foto
        if ($foto = $request->file('foto')) {
            $destinationPath = public_path('img/loker');
            $fotoName = date('YmdHis') . "." . $foto->getClientOriginalExtension();

            // Coba pindahkan file dan cek hasilnya
            if ($foto->move($destinationPath, $fotoName)) {
                $input['foto'] = $fotoName;
            } else {
                // Jika pemindahan gagal, kembalikan user ke form dengan pesan error
                return back()->with('error', 'Gagal menyimpan file foto.');
            }
        } else {
            return back()->with('error', 'Harap pilih file foto untuk diunggah.');
        }

        Loker::create($input);
        return redirect()->route('lokerbe.index')->with('sukses', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Kelola Loker';
        $loker = Loker::findOrFail($id);
        return view('fe.loker.daftar',compact('loker','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Kelola Loker';
        $loker = Loker::findOrFail($id);
        return view('be.loker.edit',compact('loker','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // @dd($request->all());

        $loker = Loker::find($id);

        $input = $request->all();
        
        // Cek apakah ada file foto yang dikirimkan dalam request
        if ($image = $request->file('foto')) {
            // Hapus foto lama jika ada
            if ($loker->foto) {
                $oldImagePath = public_path('img/loker/') . $loker->foto;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        
            // Simpan foto baru
            $destinationPath = 'img/loker/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = $profileImage;
        } else {
            unset($input['foto']);
        }
        
        // Update data loker dari request
        $loker->update($input);
        
        return redirect()->route('lokerbe.index')->with('sukses', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $loker = Loker::findOrFail($id); // Pastikan loker ditemukan
    
            $gambarPath = public_path('img/loker/' . $loker->foto);
    
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
    
            $loker->delete();
            Log::info('Loker berhasil dihapus: ID ' . $id);
    
            return redirect()->route('lokerbe.index')->with('sukses', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error menghapus data: ' . $e->getMessage());
            return redirect()->route('lokerbe.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
