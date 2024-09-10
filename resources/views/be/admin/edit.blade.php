@extends('be.partials.main')

@section('container')

<form action="{{ route('anggota.update', $users->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Nama</label>
                    <input type="text" name="nama" class="form-control flex-grow-1" required placeholder="Masukkan Nama" value="{{ $users->nama }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Email</label>
                    <input type="email" name="email" class="form-control flex-grow-1" required placeholder="Isi Email" value="{{ $users->email }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Alamat</label>
                    <input type="text" name="alamat" class="form-control flex-grow-1" required placeholder="Masukkan alamat" value="{{ $users->alamat }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Posisi</label>
                    <input type="text" name="posisi" class="form-control flex-grow-1" required placeholder="Masukkan Posisi" value="{{ $users->posisi }}">
                </div>
                <div class="form-group d-flex align-items-center">
                    <label class="mr-3" style="width: 100px;">Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control flex-grow-1" required placeholder="Deskripsi tentang anda">{{ $users->deskripsi }}</textarea>
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
        <a href="/anggota"><button type="button" class="btn btn-secondary btn-separator">Batal</button></a>
        <input type="submit" value="Simpan" name="edit" class="btn btn-warning">
    </div>
</form>

@endsection