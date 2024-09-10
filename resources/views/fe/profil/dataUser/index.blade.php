@extends('fe.profil.partials.main')
@section('container')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="d-flex">
            <!-- Biodata Siswa-->
            <div class="col-md-6">
                <h2 class="text-center mt-4">Profil</h2>
                <div class="d-flex flex-column align-items-center">
                    <img src="../img/profil.jpg" alt="Foto Siswa" class="img-fluid rounded mb-4" style="max-width: 200px;">
                    <h3 class="mt-4"><strong>Indra Kurniawan</strong></h3>
                    <div class="col-md-7"> <!-- Margin kiri pada div Biodata -->
                        <h4><strong>Biodata</strong></h4>
                        <p><strong>Usia:</strong> 26</p>
                        <p><strong>Jenis Kelamin:</strong> Laki-Laki</p>
                        <p><strong>Kelas:</strong> A</p>
                        <p><strong>Pelatihan:</strong> Otomotif</p>
                    </div>
                </div>
            </div>
            <!-- Data Pelatihan-->
            <div class="col-md-5 mt-4">
                <h3 class="text-center">Data Pelatihan</h3>
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
                                <td>Otomotif</td>
                                <td>A/Senin-Jumat/09:00-12:00/Ruang Komputer</td>
                                <td>Pertemuan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Nilai Siswa -->
                <div class="mt-4">
                    <h3 class="text-center">Nilai Siswa</h3>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Jenis Pelatihan</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Instruktur -->
                <div class="mt-4">
                    <h3 class="text-center">Instruktur</h3>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Instruktur</th>
                                    <th>NIP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection