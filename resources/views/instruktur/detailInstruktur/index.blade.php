@extends('instruktur.partials.main')
@section('container')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="d-flex">
            <!-- Detail -->
            <div class="col-md-6">
                <h2 class="text-center mt-4">Detail Dosen</h2>
                <div class="d-flex flex-column align-items-center">
                    <img src="../img/fotoinstruktur/{{ $instruktur->foto }}" alt="Foto Siswa" class="img-fluid rounded mb-4" style="max-width: 200px;">
                    <h3 class="mt-4"><strong>{{ $instruktur->nama }}</strong></h3>
                    <div class="col-md-7"> <!-- Margin kiri pada div Biodata -->
                        <h4><strong>Biodata Instruktur</strong></h4>
                        <p><strong>NIP:</strong>{{ $instruktur->nip }}</p>
                        <p><strong>Jenis Kelamin:</strong>{{ $instruktur->jeniskelamin }}</p>
                        <p><strong>Pelatihan:</strong>
                            <td>{{ $instruktur->pelatihan->pelatihan ?? 'Tidak ada pelatihan' }}</td>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <h3 class="text-center">Pelajaran</h3>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pelatihan</th>
                                <th>Kelas/Hari/Jam/Ruang</th>
                                <th>Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $instruktur->pelatihan->pelatihan ?? 'Tidak ada pelatihan' }}</td>
                                <td>{{ $instruktur->pelatihan->hari ?? 'Tidak ada' }}/{{ $instruktur->pelatihan->start ?? 'Tidak ada' }}-{{ $instruktur->pelatihan->end ?? 'Tidak ada' }}/{{ $instruktur->pelatihan->ruangan ?? 'Tidak ada' }}</td>
                                <td>{{ $instruktur->pelatihan->jenis ?? 'Tidak ada pelatihan' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <h3 class="text-center">Siswa</h3>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pelatihan</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($instruktur->pelatihan && $instruktur->pelatihan->daftarPelatihan->isNotEmpty())
                                @foreach($instruktur->pelatihan->daftarPelatihan as $index => $daftar)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $daftar->pelatihan->pelatihan }}</td>
                                    <td>{{ $daftar->nama }}</td>
                                    <td>{{ $daftar->jenis }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" class="text-center">Data siswa belum ada</td>
                                </tr>
                                @endif
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ url('/datainstruktur') }}" class="btn btn-primary">Kembali ke Daftar Dosen</a>
        </div>
    </div>
    @endsection