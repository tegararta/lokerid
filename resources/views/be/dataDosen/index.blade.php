@extends('be.partials.main')
@section('container')
<div class="container mt-4">
    <h2 class="text-center">{{ $title }}</h2>
    <div class="card shadow-lg mt-4">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Instruktur</th>
                        <th>NIP</th>
                        <th>Jurusan</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dosenList as $index => $dosen)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dosen['nama'] }}</td>
                        <td>{{ $dosen['nip'] }}</td>
                        <td>{{ $dosen['pelatihan'] }}</td>
                        <td>
                            <a href="{{ route('datadosen.show', $index) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
