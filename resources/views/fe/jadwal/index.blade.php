@extends('fe.profil.partials.main')
@section('container')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header text-center">
                Jadwal Pelatihan Sentra Budi Perkasa Kota Palembang
            </div>
            <div class="card-body flex">
                <form>
                    

                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="kelas" placeholder="Kelas">
                    </div>

                    <div class="mb-3">
                        <h2">Pelatihan</h2>
                        <input type="text" class="form-control" id="pelatihan" placeholder="Pelatihan">
                    </div>
                </form>
        
                <!-- Jadwal Pelatihan Table -->
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
                                <td>Komputer</td>
                                <td>A/Senin-Jumat/09:00-12:00/Ruang Komputer</td>
                                <td>Pertemuan</td>
                            </tr>
                            <!-- Tambahkan data lainnya di sini -->
                        </tbody>
                    </table>
                </div>

                <!-- Nilai Siswa Table -->
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

                <!-- Instruktur Table -->
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
@endsection
