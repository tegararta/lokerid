@extends('instruktur.partials.main')
@section('container')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css"> --}}
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .modal-header {
            background-color: #0d6efd;
            color: white;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        .dataTables_filter {
            padding-bottom: 0.6rem !important;
        }
    </style>
    </head>

    <body>
        <div class="container mt-5">
            <!-- Modal Detail Data -->
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Detail Peserta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="" id="Foto" alt="Foto" class="img-fluid rounded mb-4 d-block mx-auto"
                                style="max-width: 200px;">
                            <table class="table table-bordered">
                                <tr>
                                    <th>NIK</th>
                                    <td id="Nik"></td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td id="Nama"></td>
                                </tr>
                                <tr>
                                    <th>Tempat tanggal lahir</th>
                                    <td id="Ttl"></td>
                                </tr>
                                <tr>
                                    <th>Usia</th>
                                    <td id="Usia"></td>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <td id="Agama"></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td id="Status"></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td id="JenisKelamin"></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td id="Alamat"></td>
                                </tr>
                                <tr>
                                    <th>Alamat Domisilir</th>
                                    <td id="Alamatdom"></td>
                                </tr>
                                <tr>
                                    <th>Pendidikan</th>
                                    <td id="Pendidikan"></td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <td id="Pekerjaan"></td>
                                </tr>
                                <tr>
                                    <th>Terpadu</th>
                                    <td id="Terpadu"></td>
                                </tr>
                                <tr>
                                    <th>Nomor Telpon</th>
                                    <td id="Nowa"></td>
                                </tr>
                                <tr>
                                    <th>Klaster</th>
                                    <td id="Klaster"></td>
                                </tr>
                                <tr>
                                    <th>Pelatihan yang Diikuti</th>
                                    <td id="Pelatihan"></td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td id="Kelas"></td>
                                </tr>
                                <tr>
                                    <th>Lampiran</th>
                                    <td>
                                        <a href="#" id="Lampiran" target="_blank" class="btn btn-sm btn-info">Lihat
                                            Lampiran</a>
                                        <span id="noLampiran" class="text-muted"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            @if (session('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('sukses') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Klaster</th>
                        <th>Pelatihan yang Diikuti</th>
                        <th>Kelas</th>
                        <th>Lampiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa->pelatihan->daftarPelatihan as $pp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pp->nama }}</td>
                            <td>{{ $pp->jenis_kelamin }}</td>
                            <td>{{ $pp->klaster }}</td>
                            <td>{{ $pp->pelatihan ? $pp->pelatihan->pelatihan : 'Tidak ada pelatihan' }}</td>
                            <td>{{ $pp->kelas }}</td>
                            <td>
                                @if ($pp->pdf)
                                    <a href="{{ asset('pdf/lampiran/' . $pp->pdf) }}" class="btn btn-sm btn-info"
                                        target="_blank">
                                        Lampiran
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada lampiran</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success text-white me-2"
                                        data-bs-toggle="modal" data-bs-target="#detailModal"
                                        data-foto="{{ asset('../img/member/' . $pp->foto) }}" data-nik="{{ $pp->nik }}"
                                        data-nama="{{ $pp->nama }}" data-ttl="{{ $pp->ttl }}"
                                        data-agama="{{ $pp->agama }}" data-alamat="{{ $pp->alamat }}"
                                        data-alamatdom="{{ $pp->alamatdom }}" data-pendidikan="{{ $pp->pendidikan }}"
                                        data-pekerjaan="{{ $pp->pekerjaan }}" data-nowa="{{ $pp->nowa }}"
                                        data-usia="{{ $pp->usia }}" data-terpadu="{{ $pp->terpadu }}"
                                        data-kelas="{{ $pp->kelas }}" data-status="{{ $pp->status }}"
                                        data-jenis-kelamin="{{ $pp->jenis_kelamin }}" data-klaster="{{ $pp->klaster }}"
                                        data-pelatihan="{{ $pp->pelatihan ? $pp->pelatihan->pelatihan : 'Tidak ada pelatihan' }}"
                                        data-kelas="{{ $pp->kelas }}"
                                        data-lampiran="{{ $pp->pdf ? asset('pdf/lampiran/' . $pp->pdf) : '' }}">
                                        <i class="fas fa-person"></i>
                                    </button>

                                    <form action="{{ route('deletepesertapelatihan.destroy', $pp->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Anda Yakin Ingin Menghapus data?')"
                                            class="btn btn-sm btn-danger text-white">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.colVis.min.js"></script>

        <script>
            $('#detailModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Tombol yang diklik

                // Ambil data dari atribut data-*
                var foto = button.data('foto');
                var nik = button.data('nik');
                var nama = button.data('nama');
                var ttl = button.data('ttl');
                var alamat = button.data('alamat');
                var alamatdom = button.data('alamatdom');
                var pendidikan = button.data('pendidikan');
                var pekerjaan = button.data('pekerjaan');
                var nowa = button.data('nowa');
                var usia = button.data('usia');
                var terpadu = button.data('terpadu');
                var status = button.data('status');
                var agama = button.data('agama');
                var jenisKelamin = button.data('jenis-kelamin');
                var klaster = button.data('klaster');
                var pelatihan = button.data('pelatihan');
                var kelas = button.data('kelas');
                var lampiran = button.data('lampiran');

                // Isi data ke dalam modal
                var modal = $(this);
                modal.find('#Foto').attr('src', foto);
                modal.find('#Nik').text(nik);
                modal.find('#Nama').text(nama);
                modal.find('#Ttl').text(ttl);
                modal.find('#Alamat').text(alamat);
                modal.find('#Alamatdom').text(alamatdom);
                modal.find('#Pendidikan').text(pendidikan);
                modal.find('#Pekerjaan').text(pekerjaan);
                modal.find('#Nowa').text(nowa);
                modal.find('#Usia').text(usia);
                modal.find('#Terpadu').text(terpadu);
                modal.find('#Status').text(status);
                modal.find('#Agama').text(agama);
                modal.find('#JenisKelamin').text(jenisKelamin);
                modal.find('#Klaster').text(klaster);
                modal.find('#Pelatihan').text(pelatihan);
                modal.find('#Kelas').text(kelas);

                if (lampiran) {
                    modal.find('#Lampiran').attr('href', lampiran).show();
                    modal.find('#noLampiran').hide();
                } else {
                    modal.find('#Lampiran').hide();
                    modal.find('#noLampiran').text('Tidak ada lampiran').show();
                }
            });
        </script>


        <script>
            $(document).ready(function() {
                $('#datatable').DataTable({
                    "paging": true,
                    "pageLength": 10,
                    "scrollX": true,
                    "ordering": false
                });
            });
        </script>
    </body>
@endsection
