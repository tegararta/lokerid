@extends('be.partials.main')

@section('container')

<form action="{{ route('lokerbe.update', $loker->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Judul</label>
                    <input type="text" name="judul" class="form-control flex-grow-1" required placeholder="Masukkan Judul" value="{{ $loker->judul }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Perusahaan</label>
                    <input type="text" name="nama" class="form-control flex-grow-1" required placeholder="nama Perusahaan" value="{{ $loker->nama }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control flex-grow-1" required placeholder="Masukkan Pekerjaan" value="{{ $loker->pekerjaan }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control flex-grow-1" required placeholder="Masukkan Lokasi" value="{{ $loker->lokasi }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control flex-grow-1" required placeholder="Deskripsi">{{ $loker->deskripsi }}</textarea>
                </div>
                <div class="form-group d-flex align-items-center">
                <label class="mr-3" style="width: 100px;">Foto</label>
                <input type="file" name="foto" class="form-control" >
            </div>
        </div>
    </div>
</div>
    
    <div class="modal-footer mt-5">
        <a href="/lokerbe"><button type="button" class="btn btn-secondary btn-separator">Batal</button></a>
        <input type="submit" value="Simpan" name="edit" class="btn btn-warning">
    </div>
</form>

@endsection