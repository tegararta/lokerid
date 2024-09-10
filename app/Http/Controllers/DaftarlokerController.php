<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Daftarloker;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DaftarlokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loker = Loker::all();
        return view('fe.loker.daftar',compact('loker'));
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
        $validateData = $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'nowa' => 'required',
            'pilihan' => 'required',
            'pengalaman' => 'nullable'
        ]);
        Daftarloker::create($validateData);
        return redirect(route('daftarloker.index'))->with('sukses','Berhasil Mengirimkan Pendaftaran');
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
