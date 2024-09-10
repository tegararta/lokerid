<?php

namespace App\Http\Controllers;

use App\Models\Infopelatihan;
use Illuminate\Http\Request;

class FepelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infopel = Infopelatihan::all();
        return view('fe.infopelatihan.index',compact('infopel'));
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
    public function show(string $id)
    {
        $pelatihan = Infopelatihan::find($id);
    
        // Mengecek apakah data pelatihan ditemukan
        if (!$pelatihan) {
            return redirect('/infopelatihan')->with('error', 'Pelatihan tidak ditemukan');
        }
    
        // Mengembalikan view dengan data pelatihan
        return view('fe.infopelatihan.detail', compact('pelatihan'));
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
