@extends('be.partials.main')
@section('container')

<div class="container mt-5">
    <h2>Detail Pengajuan Dana</h2>

    <div class="card">
        <div class="card-header">
            Detail Pengajuan
        </div>
        <div class="card-body">
            <h5 class="card-title">Nama: {{ $pengajuan->nama }}</h5>
            <p class="card-text"><strong>Jenis Pelatihan:</strong> {{ $pengajuan->jenis_pelatihan }}</p>
            <p class="card-text"><strong>Jenis Usaha:</strong> {{ $pengajuan->jenis_usaha }}</p>
            <p class="card-text"><strong>Status:</strong> 
                <span class="badge bg-{{ $pengajuan->status == 'Diterima' ? 'success' : ($pengajuan->status == 'Ditolak' ? 'danger' : 'warning') }}">
                    {{ $pengajuan->status }}
                </span>
            </p>
            @if($pengajuan->proposal)
                <p><strong>Proposal:</strong> <a href="{{ asset($pengajuan->proposal) }}" target="_blank">Lihat Proposal</a></p>
            @endif

            <a href="{{ route('admin.pengajuan-dana.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection