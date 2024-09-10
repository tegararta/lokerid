@extends('be.partials.main')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Loker
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Loker</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!--  -->

                    <form action="{{ route('lokerbe.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Judul Loker</label>
                            <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama perusahaan"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan nama pekerjaan"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" placeholder="lokasi"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea maxlength="120" type="text" name="deskripsi" class="form-control"
                                placeholder="Masukkan deskripsi" required></textarea>
                        </div>
                        <label for="formFile" class="form-label">Unggah Foto</label>
                        <input class="form-control" name="foto" type="file" id="formFile" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Tambah" name="simpan" class="btn btn-primary">

                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    @if (Session::has('sukses'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('sukses') }}
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($loker->count() > 0)
                        @foreach($loker as $artikels)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $artikels->judul }}</td>
                            <td>{{ $artikels->nama }}</td>
                            <td>{{ $artikels->pekerjaan }}</td>
                            <td>{{ $artikels->lokasi }}</td>
                            <td class="text-center">
                                {{-- <div class="btn-group">
                                    <a data-id="" href="{{ route('lokerbe.show', $artikels->id) }}" class="btn btn-sm btn-info text-white show-modal mr-2"
                                        data-toggle="modal" data-target="#show_user">
                                        <i class="fas fa-fw fa-search"></i>
                                    </a>
                                </div> --}}
                                <div class="btn-group">
                                    <a data-id="" href="{{ route('lokerbe.edit', $artikels->id) }}" class="btn btn-sm btn-info text-white show-modal mr-2"
                                        data-toggle="modal" data-target="#show_user">
                                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <form action="{{ route('lokerbe.destroy', $artikels->id) }}" onsubmit="return confirm('Yakin ingin menghapus?')" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger text-white show-modal mr-2">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="6">Tidak Ada Data Yang Tersimpan</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": true,
            "pageLength": 10
        });
    });
</script>

    @endsection
