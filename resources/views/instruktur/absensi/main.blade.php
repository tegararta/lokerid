@extends('instruktur.partials.main')
@section('container')
<h3 class="mt-4">Profile</h3>
<div class="row gy-4 mt-2">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card p-4 border border-3 shadow-lg h-100">
            <a class="nav-link d-flex align-items-center justify-content-center h-100 text-decoration-none text-dark" href="{{ route('presensi.index') }}">
                <i class="bi bi-clipboard2-check-fill fs-2 me-3"></i>
                <span class="fw-bold">Input Kehadiran</span>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">        
        <div class="card p-4 border border-3 shadow-lg h-100">
            <a class="nav-link d-flex align-items-center justify-content-center h-100 text-decoration-none text-dark" href="{{ route('presensi.download') }}">
                <i class="bi bi-cloud-arrow-down-fill fs-2 me-3"></i>
                <span class="fw-bold">Unduh Absensi</span>
            </a>
        </div>
    </div>
</div>

@endsection