@extends('fe.profil.partials.main')
@section('container')
<div class="container mt-5 mb-3 ">
    <div class="card mt-5 shadow-lg">
        <div class="d-flex">
            <!-- Biodata Siswa-->
            <div class="col-md-6">
                <h2 class="text-center mt-4">Profil Peserta</h2>
                <div class="d-flex flex-column align-items-center">
                    <img src="../img/member/{{ $memberBiodata->foto }}" alt="Foto Siswa" class="img-fluid rounded mb-4" style="max-width: 200px;">
                    <h3 class="mt-4"><strong>{{ $memberBiodata->nama }}</strong></h3>
                    <div class="col-md-7">
                        <h4><strong>Biodata</strong></h4>
                        <p><strong>Usia:</strong> {{ $memberBiodata->usia }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $memberBiodata->jenis_kelamin }}</p>
                        <p><strong>Kelas:</strong> {{ $memberBiodata->kelas }}</p>
                    </div>
                </div>
            </div>

            <!-- Data Pelatihan-->
            <div class="col-md-5 mt-4 mb-5">
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
                            @if($memberBiodata->member->daftarpelatihan && $memberBiodata->member->daftarpelatihan->isNotEmpty())
                            @foreach($memberBiodata->member->daftarpelatihan as $index => $daftar)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $daftar->pelatihan->pelatihan ?? 'Tidak ada nama pelatihan' }}</td>
                                <td>{{ $daftar->kelas ?? 'Tidak ada data' }}/{{ $daftar->pelatihan->hari ?? 'Tidak ada data' }}/{{ $daftar->pelatihan->start ?? 'Tidak ada data' }}/{{ $daftar->pelatihan->end ?? 'Tidak ada data' }}/{{ $daftar->pelatihan->ruangan ?? 'Tidak ada data' }}</td> <!-- Sesuaikan jadwal dan ruang jika ada -->
                                <td>{{ $daftar->pelatihan->jenis ?? 'Tidak ada nama pelatihan' }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center">Data pelatihan belum ada</td>
                            </tr>
                            @endif
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
                                    <th>Kelas</th>
                                    <th>Jenis Pelatihan</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilai as $index => $nil)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $nil->kelas }} </td>
                                    <td>{{ $nil->jenispelatihan }}</td>
                                    <td>{{ $nil->nilai }}</td>
                                </tr>
                                @endforeach
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
                                @if($instruktur->isNotEmpty())
                                @foreach($instruktur as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->nama ?? 'Tidak ada nama instruktur' }}</td>
                                    <td>{{ $data->nip ?? 'Tidak ada NIP' }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" class="text-center">Instruktur belum ada</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection