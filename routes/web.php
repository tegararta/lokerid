<?php

use App\Models\User;
use App\Models\Loker;
use App\Models\Member;
use App\Models\Pelatihan;
use App\Models\PengajuanDana;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DaftarpelController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\DaftarlokerController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengajuanDanaController;
use App\Http\Controllers\DaftarpelatihanController;
use App\Http\Controllers\AdminPengajuanDanaController;
use App\Http\Controllers\BiodataMemberController;
use App\Http\Controllers\FepelatihanController;
use App\Http\Controllers\InfopelatihanController;
use App\Http\Controllers\PesertapelatihanController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\NilaiMemberController;
use App\Models\BiodataMember;
use App\Models\Daftarpelatihan;
use App\Models\Infopelatihan;
use App\Models\Instruktur;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Route::get('/pelatihan', function () {
//     return view('fe.pelatihan.index');
// });


// Route::get('/daftarpelatihan', function () {
//     $pelatihan = Pelatihan::all();
//     return view('fe.pelatihan.daftar',compact('pelatihan'));
// });

// Route::get('/daftarloker', function () {
//     $loker = Loker::all();
//     return view('fe.loker.daftar',compact('loker'));
// });
Route::get('/admin', function () {
    return view('be.admin.index');
});
// Route::get('/login', function () {
//     return view('login');
// });




Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);

Route::middleware(['auth'])->group(function(){
    Route::resource('/admin',AdminController::class);
    Route::get('/logout',[LoginController::class,'logout']);
    Route::resource('/lokerbe',LokerController::class);
    Route::resource('/pelatihanbe',PelatihanController::class);
    Route::resource('/daftarlokerbe',PendaftaranController::class);
    Route::resource('/daftarpelatihanbe',DaftarpelController::class);
    Route::get('/datainstruktur', function () {
        $title = "instruktur";
        $instruktur = Instruktur::with('pelatihan')->get();
        return view('be.dataInstruktur.index',compact('title', 'instruktur'));
    });
    Route::get('/datainstruktur/{id}', function ($id) {
        $title = "instruktur";
        $instruktur = Instruktur::with(['pelatihan.daftarPelatihan'])->find($id);
        if (!$instruktur) {
            abort(404);
        }
        return view('be.dataInstruktur.detail', compact('title', 'instruktur'));
    })->name('datainstruktur.show');

    // Admin Pengajuan
    Route::get('/pengajuan', [AdminPengajuanDanaController::class, 'index'])->name('admin.pengajuan-dana.index');
    Route::get('/pengajuandetail{id}/{status}', [AdminPengajuanDanaController::class, 'updateStatus'])->name('admin.pengajuan-dana.update-status');
    Route::get('/pengajuandetail/{id}', [AdminPengajuanDanaController::class, 'show'])->name('admin.pengajuan-dana.show');

    // menambahkan sertifikat
    

    // info Pelatihan
    Route::resource('/infopel',InfopelatihanController::class);
    
    Route::resource('/pesertapelatihan',PesertapelatihanController::class);
});

// Instruktur
Route::middleware(['auth.instruktur'])->group(function() {
    Route::get('/instruktur-logout', [InstrukturController::class, 'logout'])->name('instruktur.logout');
    Route::get('/peserta', function() {
        $title = "instruktur";
        $instrukturId = auth('instruktur')->id();
        $siswa = Instruktur::with(['pelatihan.daftarPelatihan'])->find($instrukturId);
        if (!$siswa) {
            abort(404);
        }
        return view('instruktur.peserta.index', compact('title', 'siswa'));

    });
    Route::resource('/inputnilai',NilaiMemberController::class);
    
    //Sertifikat
    Route::get('/sertif',function(){
        return view('instruktur.sertifikat.index');
    });

    Route::get('/pilih-member', [MemberController::class, 'pilihMember'])->name('sertifikat.pilih');
    Route::get('/upload-sertifikat', [MemberController::class, 'tampilkanFormUnggah'])->name('sertifikat.tampil');
    Route::post('/sertifikat/{id}', [MemberController::class, 'unggahSertifikat'])->name('sertifikat.upload');

    //Datainstruktur
    Route::get('/datadiri', function() {
        $title = "instruktur";
        $instrukturId = auth('instruktur')->id();
        $instruktur = Instruktur::with(['pelatihan.daftarPelatihan'])->find($instrukturId);
        if (!$instruktur) {
            abort(404);
        }
        return view('instruktur.detailInstruktur.index', compact('title', 'instruktur'));
    })->name('datainstruktur.show');
});

Route::get('/pelatihan', function () {
    $pelatihan = Pelatihan::all();
    return view('fe.pelatihan.index',compact('pelatihan'));
});

Route::get('/loker', function () {
    $loker = Loker::all();
    return view('fe.loker.index',compact('loker'));
});

Route::middleware(['auth.member'])->group(function(){
    Route::get('/index', [MemberController::class, 'memberDashboard']);
   
    Route::get('/hello',function(){
        return view('fe.infopelatihan.detail');
    });
    Route::get('/dashboard',function(){
        return view('fe.dashboard.index');
    });
    Route::get('/data', [DaftarpelatihanController::class, 'biodatamember']);
    // Route::get('/pengajuan',function(){
    //     return view('fe.profil.dashboard.pengajuan');
    // });
    Route::resource('/daftarloker',DaftarlokerController::class);
    Route::resource('/daftarpelatihan',DaftarpelatihanController::class);
    Route::post('/member-logout', [MemberController::class, 'logout'])->name('member.logout');
    Route::get('/pengajuan-dana', [PengajuanDanaController::class, 'index'])->name('pengajuan-dana.index');
    Route::post('/pengajuan-dana/store', [PengajuanDanaController::class, 'store'])->name('pengajuan-dana.store');
    Route::get('/pengajuan-dana/update-status/{id}/{status}', [PengajuanDanaController::class, 'updateStatus'])->name('pengajuan-dana.update-status');

    // lihat sertifikat
    // Route untuk menampilkan sertifikat pengguna
    Route::get('/sertifikat-saya', [MemberController::class, 'lihatSertifikat'])->name('sertifikat.saya');
    Route::get('/download-sertifikat/{id}', [MemberController::class, 'downloadSertifikat'])->name('download.sertifikat');

    Route::resource('/infopelatihan',FepelatihanController::class);

});
Route::get('/infopelatihan',function(){
    $infopel = Infopelatihan::all();
    return view('fe.infopelatihan.index',compact('infopel'));
});

// member login
Route::get('/member-login', [MemberController::class, 'showMemberLoginForm'])->name('member.login');
Route::post('/member-login', [MemberController::class, 'memberLogin']);

// member register
Route::get('/member-register', [MemberController::class, 'showRegistrationForm'])->name('member.register');
Route::post('/member-register', [MemberController::class, 'register']);

// Login Instruktur
Route::get('/instruktur-login', [InstrukturController::class, 'showInstrukturLoginForm'])->name('instruktur.login');
Route::post('/instruktur-login', [InstrukturController::class, 'instrukturLogin']);

// Instruktur register
Route::get('/regist-instruktur', [InstrukturController::class, 'showRegistrationForm'])->name('instruktur.register');
Route::post('/regist-instruktur', [InstrukturController::class, 'registerInstruktur']);

// Route khusus untuk instruktur
Route::get('/12', function(){
    return 'hello';
});



