@extends('instruktur.partials.main')
@section('container')

<div class="container">
    <h1>Input Nilai untuk {{ $data->nama}}</h1>

    <!-- Tampilkan pesan sukses atau error -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <!-- Form untuk menginput nilai -->
    <div class="mb-3 mt-4">
        <label for="pelatihan" class="form-label">Jenis</label>
        <input type="pelatihan" class="form-control" id="pelatihan" name="pelatihan" value="{{ old('pelatihan', $data->pelatihan->judul) }}" readonly>
    </div>
    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        <input type="hidden" class="form-control" id="id_member" name="id_member" value="{{ old('pelatihan', $data->id_member) }}" readonly>
        <input type="hidden" class="form-control" id="id_pelatihan" name="id_pelatihan" value="{{ old('pelatihan', $data->id_pelatihan) }}" readonly>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('daftarpelatihan', $data->kelas) }}" readonly>
        </div>
        <div class="mb-3">
            <label for="jenispelatihan" class="form-label">Jenis Pelatihan yang diikuti</label>
            <input type="text" class="form-control" id="jenispelatihan" name="jenispelatihan" value="{{ old('pelatihan', $data->pelatihan) }}" readonly>
        </div>
        
        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="number" class="form-control" id="nilai" name="nilai" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
