<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $title = 'Data Dodffsen';

        // Data dosen statis
        $dosenList = [
            [
                'nama' => 'Dr. Ahmad Fauzan', 
                'nip' => '198709102021101001', 
                'pelatihan' => 'Otomotif', 
                'kelas' => 'A', 
                'jadwal' => 'Senin-Jumat/09:00-12:00/Ruang Otomotif',
                'siswa' => ['Aminah', 'Joko', 'Siti', 'Rudi']
            ],
            [
                'nama' => 'Dr. Sri Wahyuni', 
                'nip' => '197203012019031002', 
                'pelatihan' => 'Komputer', 
                'kelas' => 'B', 
                'jadwal' => 'Senin-Jumat/09:00-12:00/Ruang Komputer',
                'siswa' => ['Ahmad', 'Fatimah', 'Nurul', 'Budi']
            ],
            [
                'nama' => 'Ir. Budi Santoso, M.T.', 
                'nip' => '198104022008121003', 
                'pelatihan' => 'Elektro', 
                'kelas' => 'C', 
                'jadwal' => 'Senin-Jumat/09:00-12:00/Ruang Elektro',
                'siswa' => ['Toni', 'Karin', 'Dewi', 'Agus']
            ],
            [
                'nama' => 'Prof. Dr. Bambang Suryono', 
                'nip' => '196509151993021004', 
                'pelatihan' => 'Salon', 
                'kelas' => 'D', 
                'jadwal' => 'Senin-Jumat/09:00-12:00/Ruang Salon',
                'siswa' => ['Rahma', 'Dina', 'Ali', 'Reza']
            ],
        ];

        // Kirim data ke view
        return view('instruktur.dataDosen.index', compact('title', 'dosenList'));
    }
    public function show($id)
    {
        $title = 'Detail Dosen';
        // Data dosen statis
        $dosenList = [
            [
                'nama' => 'Dr. Ahmad Fauzan', 
                'nip' => '198709102021101001', 
                'pelatihan' => 'Otomotif', 
                'kelas' => 'A', 
                'jadwal' => 'Senin-Jumat/09:00-12:00/Ruang Otomotif',
                'siswa' => ['Aminah', 'Joko', 'Siti', 'Rudi']
            ],
            [
                'nama' => 'Dr. Sri Wahyuni', 
                'nip' => '197203012019031002', 
                'pelatihan' => 'Komputer', 
                'kelas' => 'B', 
                'jadwal' => 'Senin-Jumat/09:00-12:00/Ruang Komputer',
                'siswa' => ['Ahmad', 'Fatimah', 'Nurul', 'Budi']
            ],
            [
                'nama' => 'Ir. Budi Santoso, M.T.', 
                'nip' => '198104022008121003', 
                'pelatihan' => 'Elektro', 
                'kelas' => 'C', 
                'jadwal' => 'Senin-Jumat/09:00-12:00/Ruang Elektro',
                'siswa' => ['Toni', 'Karin', 'Dewi', 'Agus']
            ],
            [
                'nama' => 'Prof. Dr. Bambang Suryono', 
                'nip' => '196509151993021004', 
                'pelatihan' => 'Salon', 
                'kelas' => 'D', 
                'jadwal' => 'Senin-Jumat/09:00-12:00/Ruang Salon',
                'siswa' => ['Rahma', 'Dina', 'Ali', 'Reza']
            ],
        ];

        // Pastikan id yang diterima valid
        if (!isset($dosenList[$id])) {
            return redirect('/data1')->with('error', 'Data dosen tidak ditemukan.');
        }

        // Ambil data dosen berdasarkan ID
        $dosen = $dosenList[$id];

        // Tampilkan halaman detail dengan data dosen
        return view('instruktur.dataDosen.detail', compact('title', 'dosen'));
    }
}
