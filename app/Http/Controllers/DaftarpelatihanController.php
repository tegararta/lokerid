<?php

namespace App\Http\Controllers;

use App\Models\Daftarpelatihan;
use App\Models\Instruktur;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class DaftarpelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberId = auth('member')->id();
        $memberBiodata = Daftarpelatihan::where('id_member', $memberId)->first();
        $pelatihan = Pelatihan::all();
        return view('fe.pelatihan.daftar', compact('pelatihan', 'memberBiodata'));
    }

    public function biodatamember()
    {
        $memberId = auth('member')->id();
        $memberBiodata = Daftarpelatihan::where('id_member', $memberId)->first();
        if ($memberBiodata) {
            $idPelatihan = $memberBiodata->id_pelatihan;
            $pelatihan = Pelatihan::find($idPelatihan);
            $instruktur = Instruktur::where('id_pelatihan', $idPelatihan)->get();

            return view('fe.profil.dataUser.index', compact('memberBiodata', 'pelatihan', 'instruktur'));
        } else {

            return redirect()->back()->with('error', 'Data pelatihan tidak ditemukan.');
        }
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
            'usia' => 'required',
            'nowa' => 'required|numeric',
            'terpadu' => 'nullable|numeric',
            'kelamin' => 'required',
            'status' => 'required',
            'klaster' => 'required',
            'kelas' => 'required',
            'id_pelatihan' => 'required',
            'pdf' => 'required|file|mimes:pdf|max:8192', // max 8MB
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Ambil semua input dari request
        $input = $request->all();

        // Ambil ID member yang login
        $input['id_member'] = auth('member')->id();

        // Handle foto upload
        if ($foto = $request->file('foto')) {
            $destinationPath = public_path('img/member');
            $fotoName = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $fotoName);
            $input['foto'] = $fotoName;
        }

        // Handle PDF upload
        if ($pdf = $request->file('pdf')) {
            $destinationPath = public_path('pdf/lampiran');
            $pdfName = date('YmdHis') . "." . $pdf->getClientOriginalExtension();
            if ($pdf->move($destinationPath, $pdfName)) {
                $input['pdf'] = $pdfName; // Simpan nama file PDF ke dalam array $input
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
