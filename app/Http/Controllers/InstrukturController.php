<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Instruktur;
use App\Models\Pelatihan;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

class InstrukturController extends Controller
{
    public function index()
    {
        $pelatihan = Pelatihan::all();
        return view('fe.pelatihan.daftar', compact('pelatihan'));
    }

    public function showInstrukturLoginForm()
    {
        return view('auth.instruktur-login');
    }

    public function logout(Request $request)
    {
        Auth::guard('instruktur')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/instruktur-login')->with('status', 'Logout berhasil.');
    }

    public function instrukturLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Jika autentikasi berhasil
        if (Auth::guard('instruktur')->attempt($credentials)) {
            return redirect()->intended('/sertif');
        }

        // Jika autentikasi gagal, kirim error
        return redirect('/instruktur-login')
            ->withErrors(['loginError' => 'Username atau password salah.'])
            ->withInput($request->except('password'));
    }


    public function showRegistrationForm()
    {
        $pelatihan = Pelatihan::all();
        return view('auth.instruktur-register', compact('pelatihan'));
    }

    public function registerInstruktur(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:instrukturs,username',
            'nama' => 'required',
            'nip' => 'required',
            'jeniskelamin' => 'required',
            'id_pelatihan' => 'required',
            'password' => 'required|confirmed',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        try {
            // Menyimpan foto
            if ($foto = $request->file('foto')) {
                $destinationPath = public_path('img/fotoinstruktur');
                $fotoName = date('YmdHis') . "." . $foto->getClientOriginalExtension();
                $foto->move($destinationPath, $fotoName);
                Instruktur::create([
                    'username' => $request->username,
                    'nama' => $request->nama,
                    'nip' => $request->nip,
                    'jeniskelamin' => $request->jeniskelamin,
                    'id_pelatihan' => $request->id_pelatihan,
                    'password' => Hash::make($request->password),
                    'foto' => $fotoName, // Simpan nama file foto
                ]);
            } else {
                dd('Tidak ada file foto yang diupload.');
            }
            return redirect('/instruktur-login')->with('status', 'Akun berhasil dibuat! Silakan login.');
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
            return redirect()->back()->with('error', 'Terjadi kesalahan pada database. Silakan coba lagi.')->withInput();
        }
    }
    



    public function instrukturDashboard()
    {
        return view('instruktur.dataDosen.index');
    }

    public function pilihInstruktur()
    {
        $title = 'Pilih Instruktur';
        $instrukturs = Instruktur::all();
        return view('be.pengajuan.sertifikat', compact('instrukturs', 'title'));
    }

    public function tampilkanFormUnggah(Request $request)
    {
        $title = 'Unggah Sertifikat';
        $instruktur = Instruktur::findOrFail($request->input('instruktur_id'));
        return view('be.pengajuan.sertifikat_upload', compact('instruktur', 'title'));
    }

    public function unggahSertifikat(Request $request, $id)
    {
        $request->validate([
            'sertifikat' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        try {
            $instruktur = Instruktur::findOrFail($id);

            if ($request->hasFile('sertifikat')) {
                $filename = time() . '_' . $request->file('sertifikat')->getClientOriginalName();
                $path = $request->file('sertifikat')->move(public_path('sertifikat'), $filename);

                $instruktur->sertifikat = 'sertifikat/' . $filename;
                $instruktur->save();

                return redirect()->route('sertifikat.pilih')->with('success', 'Sertifikat berhasil diunggah.');
            }
        } catch (\Exception $e) {
            return redirect()->route('sertifikat.pilih')->with('error', 'Gagal mengunggah sertifikat. Silakan coba lagi.');
        }
    }

    public function lihatSertifikat()
    {
        if (!auth('instruktur')->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login sebagai instruktur untuk melihat sertifikat.');
        }

        $instruktur = auth('instruktur')->user();
        $message = $instruktur->sertifikat ? '' : 'Anda belum memiliki sertifikat.';

        return view('instruktur.dashboard.sertifikat', compact('instruktur', 'message'));
    }

    public function downloadSertifikat($id)
    {
        $instruktur = Instruktur::find($id);

        if ($instruktur && $instruktur->sertifikat) {
            $imageUrl = asset($instruktur->sertifikat);

            $dompdf = new Dompdf();
            $options = $dompdf->getOptions();
            $options->set('isRemoteEnabled', true);
            $dompdf->setOptions($options);

            $html = '<img src="' . $imageUrl . '" style="width:100%; height:auto;">';
            $dompdf->loadHtml($html);

            $dompdf->render();
            return $dompdf->stream('sertifikat.pdf');
        }

        return redirect()->back()->with('error', 'Sertifikat tidak ditemukan.');
    }
}
