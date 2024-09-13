@extends('be.partials.main')
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
        <!-- Alert untuk Error dan Success -->
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (session('sukses'))
    <div class="alert alert-success">
        {{ session('sukses') }}
    </div>
    @endif --}}

    <!-- Tombol Tambah Data -->
    <!-- <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">
                Tambah Data Peserta
            </button>
        </div> -->

    @if(session('sukses'))
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
                <th>Nik</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Klaster</th>
                <th>Pelatihan yang Diikuti</th>
                <th>Alamat</th>
                <th>No.HP</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Lampiran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($pesertapelatihan as $pp)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pp->nama }}</td>
                <td>{{ $pp->nik }}</td>
                <td>{{ $pp->jenis_kelamin }}</td>
                <td>{{ $pp->klaster }}</td>
                <td>{{ $pp->pelatihan ? $pp->pelatihan->pelatihan : 'Tidak ada pelatihan' }}</td>
                <td>{{ $pp->alamat }}</td>
                <td>{{ $pp->nowa }}</td>
                <td>{{ $pp->ttl }}</td>
                <td>
                    @if($pp->pdf)
                    <a href="{{ asset('pdf/' . $pp->pdf) }}" class="btn btn-sm btn-info" target="_blank">
                        Lampiran
                    </a>
                    @else
                    <span class="text-muted">Tidak ada lampiran</span>
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        {{-- <a href="" class="btn btn-sm btn-warning text-white">
                                    <i class="fas fa-edit"></i>
                                </a> --}}
                        <form action="{{ route('pesertapelatihan.destroy',$pp->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Anda Yakin Ingin Menghapus data?')" class="btn btn-sm btn-danger text-white">
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

    <!-- Modal Tambah Data
    <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Peserta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pesertapelatihan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="number" class="form-control" id="usia" name="usia" required>
                        </div>
                        <div class="mb-3">
                            <label for="pelatihan" class="form-label">Pelatihan yang Diikuti</label>
                            <input type="text" class="form-control" id="pelatihan" name="pelatihan" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. HP</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                        <div class="mb-3">
                            <label for="ttl" class="form-label">Tempat, Tanggal Lahir</label>
                            <input type="text" class="form-control" id="ttl" name="ttl" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

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