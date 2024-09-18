@extends('instruktur.partials.main')
@section('container')

<h3 class="mt-4">Sertifikat</h3>
<div class="row gy-4 mt-2">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card p-4 border border-3 shadow-lg h-100">
            <!-- Untuk tombol kelola sertifikat -->
            <a class="nav-link d-flex align-items-center justify-content-center h-100 text-decoration-none text-dark" href="{{ route('sertifikat.pilih') }}">
                <i class="bi bi-mortarboard-fill fs-2 me-3"></i>
                <span class="fw-bold">Input Nilai & Sertifikat</span>
                <i class="bi bi-person-arms-up fs-2 me-3"></i>
            </a>
        </div>
    </div>
</div>
@endsection
