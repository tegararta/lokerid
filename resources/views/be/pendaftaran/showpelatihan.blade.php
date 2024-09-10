@extends('be.partials.main')

@section('container')

<form action="{{ route('daftarpelatihanbe.destroy',$daftarpelatihan->id) }}" onsubmit="return confirm('Yakin ingin menghapus?')" method="POST" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    <div class="row">
        <div class="col-md-4">
            <a href="{{ $daftarpelatihan->pdf }}" download>{{ $daftarpelatihan->pdf }}</a>
        </div>
        <div class="col-md-8 mt-1">
    
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->nama }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Nomor induk Keluarga</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->nik }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Tempat tanggal lahir</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->ttl }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Agama</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->agama }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->alamat }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Alamat Domisili</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->alamatdom }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Pendidikan</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->pendidikan }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Pekerjaan</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->pekerjaan }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Nomor Wa</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->nowa }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Data Terpadu</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->terpadu }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Kelamin</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->kelamin }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->status }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Klaster</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->klaster }}" readonly disabled>
            </div>
            <div class="form-group">
                <label>Pilihan Pelatihan</label>
                <input type="text" class="form-control" value="{{ $daftarpelatihan->pilihan }}" readonly disabled>
            </div>
            
            {{-- <div class="form-group">
            <label>Deskripsi</label>
            <textarea type="text" name="deskripsi" class="form-control"  readonly disabled>{{ $artikel->deskripsi }}</textarea>
        </div> --}}
    
    </div>
    </div>

    {{-- 
  <div class="form-group" style="display: flex; align-items: center;">
    <label for="formFile" style="margin-right: 3px" class="form-label">Ganti Foto</label>
  <input class="form-control" name="img" type="file" id="formFile">
  </div> --}}
    <div class="modal-footer mt-5">
        <a href="/daftarpelatihanbe"><button type="button"
                class="btn btn-secondary btn-separator">Batal</button></a>
        <input type="submit" value="Hapus" name="hapus" class="btn btn-danger">
    </div>
</form>

@endsection