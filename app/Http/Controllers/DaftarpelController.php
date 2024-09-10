<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftarpelatihan;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class DaftarpelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kelola Pendaftaran';
        $daftarpelatihan = Daftarpelatihan::all();
        return view('be.pendaftaran.pelatihan',compact('title','daftarpelatihan'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = 'Kelola Pendaftaran';
        $daftarpelatihan = Daftarpelatihan::findOrFail($id);
        return view('be.pendaftaran.showpelatihan',compact('daftarpelatihan','title'));
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
    public function destroy(string $id)
    {
        try {
            $daftarpelatihan = Daftarpelatihan::findOrFail($id); // Pastikan $daftarpelatihan ditemukan
            
            $pdfPath = public_path('pdf/' . $daftarpelatihan->pdf);
            
            if (file_exists($pdfPath)) {
                if (unlink($pdfPath)) {
                    Log::info('File PDF berhasil dihapus: ' . $pdfPath);
                } else {
                    Log::warning('Gagal menghapus file PDF: ' . $pdfPath);
                }
            } else {
                Log::warning('File PDF tidak ditemukan: ' . $pdfPath);
            }
    
            $daftarpelatihan->delete();
            Log::info('Data berhasil dihapus: ID ' . $id);
    
            return redirect()->route('daftarpelatihanbe.index')->with('sukses', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error menghapus data: ' . $e->getMessage());
            return redirect()->route('daftarpelatihanbe.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
