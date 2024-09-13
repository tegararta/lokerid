@extends('be.partials.main')
@section('container')
<div class="container mt-4">
    
    <div class="card shadow-lg mt-4">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Instruktur</th>
                        <th>NIP</th>
                        <th>Instruktur</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instruktur as $index => $dosen)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dosen['nama'] }}</td>
                        <td>{{ $dosen['nip'] }}</td>
                        <td>{{ $dosen->pelatihan->pelatihan ?? 'Tidak ada pelatihan' }}</td>
                        <td>
                            <a href="{{ route('datainstruktur.show', $dosen->id) }}" class="btn btn-primary btn-sm">
                                Lihat Data
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
