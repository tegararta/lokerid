@extends('be.partials.main')
@section('container')

<div class="container">
    <h1>Unggah Sertifikat untuk <span class="fw-bold">{{ $member->username }}</span></h1>

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
    <!-- Form untuk mengunggah sertifikat -->
    <form action="{{ route('sertifikat.upload', $member->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="sertifikat" class="form-label">Upload Sertifikat</label>
            <input type="file" class="form-control" id="sertifikat" name="sertifikat" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Sertifikat</button>
    </form>
</div>
@endsection