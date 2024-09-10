<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\PengajuanDana;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengajuanDanaController extends Controller
{
    public function index()
    {
        $member = Auth::guard('member')->user();
        $pengajuan = PengajuanDana::where('member_id', $member->id)->latest()->first();
        return view('fe.profil.dashboard.pengajuan', compact('pengajuan', 'member'));
    }
    
    
    
    

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'jenis_pelatihan' => 'required',
            'jenis_usaha' => 'required',
            'proposal' => 'required|file|mimes:pdf',
        ]);
    
        // Cek apakah sudah ada pengajuan dengan status 'Diterima' atau 'Menunggu'
        $existingSubmission = PengajuanDana::where('member_id', Auth::guard('member')->id())
            ->whereIn('status', ['Diterima', 'Menunggu'])
            ->exists();
    
        if ($existingSubmission) {
            return redirect()->back()->with('error', 'Anda sudah memiliki pengajuan yang sedang diproses atau telah diterima.');
        }
    
        // Upload proposal
        if ($request->hasFile('proposal')) {
            // Simpan file ke folder public/pdf
            $file = $request->file('proposal');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('pdf'), $filename);
            $proposalPath = 'pdf/' . $filename;
        } else {
            $proposalPath = null;
        }
    
        // Simpan pengajuan baru dengan status 'Menunggu'
        PengajuanDana::create([
            'nama' => $request->nama,
            'jenis_pelatihan' => $request->jenis_pelatihan,
            'jenis_usaha' => $request->jenis_usaha,
            'proposal' => $proposalPath,
            'status' => 'Menunggu',
            'member_id' => Auth::guard('member')->id(), // Menambahkan ID member
        ]);
    
        return redirect()->back()->with('success', 'Pengajuan dana berhasil diajukan dan sedang menunggu persetujuan.');
    }
    
    

    public function updateStatus($id, $status)
    {
        $pengajuanDana = PengajuanDana::findOrFail($id);
        $pengajuanDana->status = $status;
        $pengajuanDana->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }
}
