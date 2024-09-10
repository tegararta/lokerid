@extends('be.partials.main')
@section('container')

<div class="container mt-5">
    <h2 class="mb-4">Daftar Pengajuan Dana</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nama</th>
                <th>Jenis Pelatihan</th>
                <th>Jenis Usaha</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengajuanDanas as $pengajuan)
                <tr>
                    <td>{{ $pengajuan->nama }}</td>
                    <td>{{ $pengajuan->jenis_pelatihan }}</td>
                    <td>{{ $pengajuan->jenis_usaha }}</td>
                    <td>
                        <span class="badge bg-{{ $pengajuan->status == 'Diterima' ? 'success' : ($pengajuan->status == 'Ditolak' ? 'danger' : 'warning') }}">
                            {{ $pengajuan->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.pengajuan-dana.update-status', [$pengajuan->id, 'Diterima']) }}" class="btn btn-success btn-sm">Terima</a>
                        <a href="{{ route('admin.pengajuan-dana.update-status', [$pengajuan->id, 'Ditolak']) }}" class="btn btn-danger btn-sm">Tolak</a>
                        <a href="{{ route('admin.pengajuan-dana.show', $pengajuan->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container mt-5">
   
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <td>No</td>
            <td>Pelatihan</td>
            <td>Total Modal Usaha</td>
        </thead>
        <tbody>
            @foreach ($infopel as $ip)
                 <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ip->pelatihan }}</td>
                <td>{{ $ip->modal }}</td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>


@endsection