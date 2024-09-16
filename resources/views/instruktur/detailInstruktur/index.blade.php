@extends('instruktur.partials.main')
@section('container')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="d-flex">
                <!-- Detail -->
                <div class="col-md-6">
                    <h2 class="text-center mt-4">Detail Dosen</h2>
                    <div class="d-flex flex-column align-items-center">
                        <img src="../img/fotoinstruktur/{{ $instruktur->foto }}" alt="Foto Siswa"
                            class="img-fluid rounded mb-4" style="max-width: 200px;">
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
                                @if ($instruktur->pelatihan && $instruktur->pelatihan->daftarpelatihan->isNotEmpty())
                                    @php
                                        $pelatihan = $instruktur->first();
                                        $daftarpelatihan = $instruktur->pelatihan->daftarPelatihan->first();
                                    @endphp
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $pelatihan->pelatihan->pelatihan ?? 'Tidak ada pelatihan' }}</td>
                                        <td>{{ $daftarpelatihan->kelas ?? 'Tidak ada' }}/{{ $pelatihan->pelatihan->hari ?? 'Tidak ada' }}/{{ $pelatihan->pelatihan->start ?? 'Tidak ada' }}-{{ $pelatihan->pelatihan->end ?? 'Tidak ada' }}/{{ $pelatihan->pelatihan->ruangan ?? 'Tidak ada' }}
                                        </td>
                                        <td>{{ $pelatihan->pelatihan->jenis ?? 'Tidak ada pelatihan' }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">jadwal belum ada</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-center">Jumlah Peserta Terdaftar</h3>
                        <div class="table-responsive mt-4">
                            <table class="table table-bordered text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Total Peserta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($peserta->isNotEmpty())
                                        <tr>
                                            <td>{{ $peserta->count() }}</td> <!-- Menampilkan total siswa terdaftar -->
                                        </tr>
                                    @else
                                        <tr>
                                            <td>Belum ada peserta terdaftar</td>
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
