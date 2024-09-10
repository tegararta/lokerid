<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PengajuanDana;
use App\Http\Controllers\Controller;
use App\Models\Infopelatihan;

class AdminPengajuanDanaController extends Controller
{
    public function index()
    {
        $infopel = Infopelatihan::all();
        $title = "Pengajuan Dana";
        $user = User::orderBy('created_at', 'desc')->get();
        $pengajuanDanas = PengajuanDana::with('member')->get();
        return view('be.pengajuan.index', compact('infopel','pengajuanDanas','user','title'));
    }

    public function show($id)
    {
        $title = "Pengajuan Dana";
        $user = User::orderBy('created_at', 'desc')->get();
        $pengajuan = PengajuanDana::with('member')->findOrFail($id);
        return view('be.pengajuan.show', compact('pengajuan','title','user'));
    }
    public function updateStatus($id, $status)
    {
        $pengajuan = PengajuanDana::find($id);
        if ($pengajuan) {
            if ($status === 'Ditolak') {
                $pengajuan->delete();
                return redirect()->back()->with('success', 'Pengajuan ditolak, data otomatis terhapus.');
            } else {
                $pengajuan->status = $status;
                $pengajuan->save();
                return redirect()->back()->with('success', 'Status pengajuan berhasil diupdate.');
            }
        }
        return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
    }
    


}
