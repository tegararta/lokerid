@extends('be.partials.main')

@section('container')

<form action="{{ route('pelatihanbe.update', $pelatihan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Judul</label>
                    <input type="text" name="judul" class="form-control flex-grow-1" required placeholder="Masukkan Judul" value="{{ $pelatihan->judul }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Perusahaan</label>
                    <input type="text" name="nama" class="form-control flex-grow-1" required placeholder="nama Perusahaan" value="{{ $pelatihan->nama }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Pelatihan</label>
                    <input type="text" name="pelatihan" class="form-control flex-grow-1" required placeholder="Masukkan Pelatihan" value="{{ $pelatihan->pelatihan }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control flex-grow-1" required placeholder="Masukkan Lokasi" value="{{ $pelatihan->lokasi }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control flex-grow-1" required placeholder="Deskripsi">{{ $pelatihan->deskripsi }}</textarea>
                </div>
                <div class="form-group d-flex align-items-center">
                <label class="mr-3" style="width: 100px;">Foto</label>
                <input type="file" name="foto" class="form-control" value=" {{ $pelatihan->foto }}" >
            </div>
        </div>
    </div>
</div>
    
    {{-- 
  <div class="form-group" style="display: flex; align-items: center;">
    <label for="formFile" style="margin-right: 3px" class="form-label">Ganti Foto</label>
  <input class="form-control" name="img" type="file" id="formFile">
  </div> --}}
    <div class="modal-footer mt-5">
        <a href="/pelatihanbe"><button type="button" class="btn btn-secondary btn-separator">Batal</button></a>
        <input type="submit" value="Simpan" name="edit" class="btn btn-warning">
    </div>
</form>

@endsection