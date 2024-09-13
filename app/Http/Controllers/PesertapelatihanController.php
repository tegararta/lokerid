<?php

namespace App\Http\Controllers;

use App\Models\Daftarpelatihan;
use App\Models\User;
use Illuminate\Http\Request;

class PesertapelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // app/Http/Controllers/PesertapelatihanController.php

    public function index()
    {
        $title = 'Peserta Pelatihan';
        $pesertapelatihan = Daftarpelatihan::with('pelatihan')->get();
        return view('be.pesertapelatihan.index', compact('title', 'pesertapelatihan'));
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
        // dd($request->all());
        $validateData = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'pelatihan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'ttl' => 'required',
        ]);

        Pesertapelatihan::create($validateData);
        return redirect(route('pesertapelatihan.index'))->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesertapelatihan $pesertapelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesertapelatihan $pesertapelatihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesertapelatihan $pesertapelatihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pesertapelatihan = Pesertapelatihan::findOrFail($id);
        $pesertapelatihan->delete();
        return redirect(route('pesertapelatihan.index'))->with('sukses', 'Data berhasil dihapus');
    }
}
