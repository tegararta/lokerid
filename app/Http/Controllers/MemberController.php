<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Instruktur;
use App\Models\Daftarpelatihan;
use App\Models\Member; // Pastikan model Member diimport
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function showMemberLoginForm()
    {
        return view('auth.member-login');
    }

    public function memberLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::guard('member')->attempt($credentials)) {
            return redirect()->intended('/index');
        }
        return back()->withErrors(['username' => 'Username atau password salah.']);
    }

    public function showRegistrationForm()
    {
        return view('auth.member-register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|unique:members,username',
            'password' => 'required',
        ]);

        try {
            Member::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            return redirect('/member-login')->with('status', 'Akun berhasil dibuat! Silakan login.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat akun. Silakan coba lagi.')->withInput();
        }
    }

    public function memberDashboard()
    {
        return view('fe.index');
    }

    public function logout(Request $request)
    {
        Auth::guard('member')->logout();

        // Optional: Invalidate the session and regenerate the token to prevent session fixation
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Logout berhasil.');; // Redirect to the login page or any other page
    }

    public function pilihMember()
    {
        $title = 'Pengajuan Dana';
        $instrukturId = auth('instruktur')->id();
        $members = Instruktur::with(['pelatihan.daftarpelatihan.member'])->find($instrukturId);
        $peserta = [];
        if (!$members) {
            abort(404);
        }
        foreach ($members->pelatihan->daftarpelatihan as $daftarPelatihan) {
            $peserta[] = $daftarPelatihan->member; // Mengakses member dari DaftarPelatihan
        }
        return view('instruktur.sertifikat.sertifikat', compact('peserta', 'title'));
        // dd($peserta);
    }


    public function tampilkanFormUnggah(Request $request)
    {
        $title = 'Pengajuan Dana';
        $member = Member::findOrFail($request->input('member_id'));
        return view('instruktur.sertifikat.sertifikat_upload', compact('member', 'title'));
    }


    public function unggahSertifikat(Request $request, $id)
    {
        // Validasi input
        // dd($request);
        $request->validate([
            'sertifikat' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        try {
            $member = Member::findOrFail($id);
            if ($request->hasFile('sertifikat')) {
                // Tentukan nama file yang unik
                $filename = time() . '_' . $request->file('sertifikat')->getClientOriginalName();

                // Simpan file sertifikat di folder public/sertifikat
                $path = $request->file('sertifikat')->move(public_path('sertifikat'), $filename);

                // Update sertifikat di database
                $member->sertifikat = 'sertifikat/' . $filename;
                $member->save();

                // Pesan sukses
                $data = Daftarpelatihan::where('id_member', $id)->first();
                // dd($data);

                return redirect()->route('nilai.input', $id)->with('success', 'Sertifikat berhasil disimpan.');
            }
        } catch (\Exception $e) {
            // Pesan error
            return redirect()->route('nilai.input')->with('error', 'Gagal mengunggah sertifikat. Silakan coba lagi.');
        }
    }

    public function lihatSertifikat()
    {
        // Pastikan pengguna terautentikasi sebagai member
        if (!auth('member')->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login sebagai member untuk melihat sertifikat.');
        }

        // Ambil member yang sedang login
        $member = auth('member')->user();

        // Debugging: Tambahkan log untuk memeriksa member
        Log::info('Member:', ['member' => $member]);

        // Atur pesan berdasarkan keberadaan sertifikat
        $message = $member->sertifikat ? '' : 'Anda belum memiliki sertifikat.';

        // Tampilkan view sertifikat dengan pesan
        return view('fe.dashboard.sertifikat', compact('member', 'message'));
    }

    public function downloadSertifikat($id)
    {
        $member = Member::find($id);

        if ($member && $member->sertifikat) {
            // Dapatkan URL gambar
            $imageUrl = asset($member->sertifikat);

            // Inisialisasi Dompdf
            $dompdf = new Dompdf();
            $options = $dompdf->getOptions();
            $options->set('isRemoteEnabled', true); // Aktifkan pemuatan gambar dari URL
            $dompdf->setOptions($options);

            // Buat HTML untuk PDF
            $html = '<img src="' . $imageUrl . '" style="width:100%; height:auto;">';
            $dompdf->loadHtml($html);

            // Render PDF
            $dompdf->render();

            // Kirim file PDF sebagai respon download
            return $dompdf->stream('sertifikat.pdf');
        }

        return redirect()->back()->with('error', 'Sertifikat tidak ditemukan.');
    }
}
