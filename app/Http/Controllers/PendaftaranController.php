<?php

namespace App\Http\Controllers;

use App\Models\Daftarloker;
use App\Models\Loker;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kelola Pendaftaran';
        $daftarloker = Daftarloker::all();
       return view('be.pendaftaran.loker',compact('title','daftarloker'));
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
      $daftarloker = Daftarloker::findOrFail($id);
      $daftarloker->delete();
      return redirect(route('daftarlokerbe.index'))->with('sukses','Data berhasil dihapus!');
    }
}
