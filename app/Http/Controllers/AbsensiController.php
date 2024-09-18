<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Daftarpelatihan;
use App\Models\Instruktur;
use App\Models\Member;
use Illuminate\Http\Request;
use PDF;

class AbsensiController extends Controller
{
    // Menampilkan semua data absensi
    // Menampilkan presensi
    public function presensi()
    {
        $instrukturId = auth('instruktur')->id();
        $absensi = Instruktur::with(['pelatihan.daftarpelatihan.member.absensi'])->find($instrukturId);
        return view('instruktur.absensi.presensi', compact('absensi'));
    }

    // Download presensi sebagai PDF
    public function downloadPdf()
    {
        $instrukturId = auth('instruktur')->id();
        $absensi = Instruktur::with(['pelatihan.daftarpelatihan.member.absensi'])->find($instrukturId);
        $pdf = PDF::loadView('instruktur.absensi.pdf', compact('absensi'))
            ->setPaper('a4', 'landscape'); // Set ukuran dan orientasi halaman

        return $pdf->download('presensi.pdf');
    }
    // Menyimpan absensi baru
    public function store(Request $request)
    {
        // Ambil semua input dari form
        $data = $request->all();

        // Iterasi melalui data member yang dihadirkan
        foreach ($data['id_member'] as $itemId => $memberId) {
            // Cek apakah ada status yang dikirim untuk member ini
            if (isset($data['status'][$itemId])) {
                // Simpan atau update data absensi
                Absensi::updateOrCreate(
                    [
                        'id_member' => $memberId,
                        'pelatihan' => $data['pelatihan'][$itemId]
                    ], // Kriteria pencarian (cari berdasarkan member dan pelatihan)
                    [
                        'nama' => $data['nama'][$itemId],
                        'status' => $data['status'][$itemId],
                    ] // Data yang diupdate atau disimpan
                );
            }
        }

        // Redirect ke halaman absensi dengan pesan sukses
        return redirect()->back()->with('success', 'Presensi berhasil disimpan. <a href="' . route('presensi.download') . '">Silakan download</a>.');

    }
}
