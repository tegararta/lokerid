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
use App\Http\Controllers\FepelatihanController;
use App\Http\Controllers\InfopelatihanController;
use App\Http\Controllers\PesertapelatihanController;
use App\Models\Infopelatihan;

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
    return view('fe.index');
});

// Route::get('/pelatihan', function () {
//     return view('fe.pelatihan.index');
// });


// Route::get('/daftarloker', function () {
//     $loker = Loker::all();
//     return view('fe.loker.daftar',compact('loker'));
// });



Route::get('/daftarpelatihan', function () {
    $pelatihan = Pelatihan::all();
    return view('fe.pelatihan.daftar',compact('pelatihan'));
});

Route::get('/daftarloker', function () {
    $loker = Loker::all();
    return view('fe.loker.daftar',compact('loker'));
});
Route::get('/admin', function () {
    return view('be.admin.index');
});




Route::middleware(['guest'])->group(function (){
    Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
    Route::post('/login',[LoginController::class,'authenticate']);
    
});

Route::middleware(['auth'])->group(function(){
    Route::get('/logout',[LoginController::class,'logout']);
    Route::resource('/admin',AdminController::class);
    Route::resource('/lokerbe',LokerController::class);
    Route::resource('/pelatihanbe',PelatihanController::class);
    Route::resource('/daftarlokerbe',PendaftaranController::class);
    Route::resource('/daftarpelatihanbe',DaftarpelController::class);

    // Admin Pengajuan
    Route::get('/profilee',function(){
        $title = "Pengajuan Dana";
        $user = User::orderBy('created_at', 'desc')->get();
        $pengajuanDanas = PengajuanDana::with('member')->get();
        return view('be.pengajuan.profile',compact('title','user','pengajuanDanas'));
    });
    Route::get('/pengajuan', [AdminPengajuanDanaController::class, 'index'])->name('admin.pengajuan-dana.index');
    Route::get('/pengajuandetail{id}/{status}', [AdminPengajuanDanaController::class, 'updateStatus'])->name('admin.pengajuan-dana.update-status');
    Route::get('/pengajuandetail/{id}', [AdminPengajuanDanaController::class, 'show'])->name('admin.pengajuan-dana.show');

    // menambahkan sertifikat
    Route::get('/pilih-member', [MemberController::class, 'pilihMember'])->name('sertifikat.pilih');

    // Route untuk menampilkan form unggah sertifikat
    Route::get('/upload-sertifikat', [MemberController::class, 'tampilkanFormUnggah'])->name('sertifikat.tampil');
    
    // Route untuk mengunggah sertifikat
    Route::post('/sertifikat/{id}', [MemberController::class, 'unggahSertifikat'])->name('sertifikat.upload');

    // info Pelatihan
    Route::resource('/infopel',InfopelatihanController::class);
    
    Route::resource('/pesertapelatihan',PesertapelatihanController::class);
    
    

});

Route::middleware(['auth.member'])->group(function(){
    Route::get('/', [MemberController::class, 'memberDashboard'])->middleware('auth.member');
    Route::get('/loker', function () {
        $loker = Loker::all();
        return view('fe.loker.index',compact('loker'));
    });
    Route::get('/pelatihan', function () {
        $pelatihan = Pelatihan::all();
        return view('fe.pelatihan.index',compact('pelatihan'));
    });
   
    Route::get('/hello',function(){
        return view('fe.infopelatihan.detail');
    });
    Route::get('/dashboard',function(){
        return view('fe.dashboard.index');
    });
    Route::get('/data',function(){
        return view('fe.profil.dataUser.index');
    });
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



