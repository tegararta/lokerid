<?php

namespace App\Http\Controllers;

use App\Models\Daftarpelatihan;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class DaftarpelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelatihan = Pelatihan::all();
        return view('fe.pelatihan.daftar',compact('pelatihan'));
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
    // Validasi input dari form
    $validateData = $request->validate([
        'nama' => 'required',
        'nik' => 'required',
        'ttl' => 'required',
        'agama' => 'required',
        'alamat' => 'required',
        'alamatdom' => 'nullable',
        'pendidikan' => 'required',
        'pekerjaan' => 'required',
        'nowa' => 'required|numeric',
        'terpadu' => 'nullable|numeric',
        'kelamin' => 'required',
        'status' => 'required',
        'klaster' => 'required',
        'pilihan' => 'required',
        'pdf' => 'required|file|mimes:pdf|max:8192' // max 8MB
    ]);

    // Ambil semua input
    $input = $request->all();

    // Ambil ID member yang login
    $input['id_member'] = auth()->id(); // Masukkan ID pengguna yang sedang login ke dalam input

    // Handle PDF upload
    if ($pdf = $request->file('pdf')) {
        $destinationPath = public_path('pdf/');
        $pdfName = date('YmdHis') . "." . $pdf->getClientOriginalExtension();

        // Move the file to the destination path
        if ($pdf->move($destinationPath, $pdfName)) {
            $input['pdf'] = $pdfName;
        } else {
            return back()->with('error', 'Gagal menyimpan file PDF.');
        }
    } else {
        return back()->with('error', 'Harap pilih file PDF untuk diunggah.');
    }

    // Simpan data ke database dengan ID member
    Daftarpelatihan::create($input);

    // Redirect dengan pesan sukses
    return redirect()->route('daftarpelatihan.index')->with('sukses', 'Data berhasil ditambahkan');
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
        //
    }
}
