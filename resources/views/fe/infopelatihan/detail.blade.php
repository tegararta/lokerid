@extends('fe.layout.main')
@section('container')
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <!-- Foto Pelatih -->
            <div class="card">
                <!-- <img src="{{ asset($pelatihan->foto) }}" class="card-img-top" alt="Foto Pelatih"> -->
                <div class="card-body">
                    <h5 class="card-title">{{ $pelatihan->nama }}</h5>
                    <p class="card-text">{{ $pelatihan->jabatan }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <!-- Detail Pelatihan -->
            <h2 class="mb-4">Detail Pelatihan</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nama:</strong> {{ $pelatihan->nama }}</li>
                <li class="list-group-item"><strong>Jabatan:</strong> {{ $pelatihan->jabatan }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $pelatihan->email }}</li>
                <li class="list-group-item"><strong>NIP:</strong> {{ $pelatihan->nip }}</li>
                <li class="list-group-item"><strong>Hari:</strong> {{ $pelatihan->hari }}</li>
                <li class="list-group-item"><strong>Jam:</strong> {{ $pelatihan->jam }}</li>
                <li class="list-group-item"><strong>Jumlah Peserta:</strong> {{ $pelatihan->jumlah }}</li>
                {{-- <li class="list-group-item"><strong>Modal:</strong> Rp{{ number_format($pelatihan->modal, 0, ',', '.') }}</li> --}}
                <li class="list-group-item"><strong>Pelatihan:</strong> {{ $pelatihan->pelatihan }}</li>
            </ul>
        </div>
    </div>
</div>

@endsection