@extends('be.partials.main')
@section('container')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="d-flex">
            <!-- Detail -->
            <div class="col-md-6">
                <h2 class="text-center mt-4">Detail Dosen</h2>
                <div class="d-flex flex-column align-items-center">
                    <img src="../img/dosen.jpg" alt="Foto Siswa" class="img-fluid rounded mb-4" style="max-width: 200px;">
                    <h3 class="mt-4"><strong>{{ $dosen['nama'] }}</strong></h3>
                    <div class="col-md-7"> <!-- Margin kiri pada div Biodata -->
                        <h4><strong>Biodata Instruktur</strong></h4>
                        <p><strong>NIP:</strong>{{ $dosen['nip'] }}</p>
                        <p><strong>Jenis Kelamin:</strong> Laki-Laki</p>
                        <p><strong>Kelas:</strong>{{ $dosen['kelas'] }}</p>
                        <p><strong>Pelatihan:</strong> {{ $dosen['pelatihan'] }}</p>
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
                                <td>{{ $dosen['pelatihan'] }}</td>
                                <td>{{ $dosen['jadwal'] }}</td>
                                <td>Pertemuan</td>
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
                                <tr>
                                    <td>1</td>
                                    <td>{{ $dosen['pelatihan'] }}</td>
                                    <td>
                                    <ul>
                @foreach($dosen['siswa'] as $siswa)
                    <li>{{ $siswa }}</li> <!-- Setiap siswa dalam list item -->
                @endforeach
            </ul>
                                    </td>
                                    <td>{{ $dosen['kelas'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('datadosen.index') }}" class="btn btn-primary">Kembali ke Daftar Dosen</a>
        </div>
    </div>
    @endsection