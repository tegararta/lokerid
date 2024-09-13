@extends('auth.layout.main')
@section('container')
<form method="POST" action="{{ route('instruktur.register') }}" class="mx-auto mt-5 p-4 shadow-lg rounded-3 bg-light" style="max-width: 400px;" id="register-form" enctype="multipart/form-data">
    @csrf
    <h2 class="text-center mb-4">Registrasi Instruktur</h2>

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input class="form-control @error('username') is-invalid @enderror" id="username" type="text" name="username" required value="{{ old('username') }}">
        @error('username')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input class="form-control @error('nama') is-invalid @enderror" id="nama" type="text" name="nama" required value="{{ old('nama') }}">
        @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input class="form-control @error('nip') is-invalid @enderror" id="nip" type="text" name="nip" required value="{{ old('nip') }}">
        @error('nip')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Sebagai Instruktur</label>
        <select class="form-select @error('id_pelatihan') is-invalid @enderror" id="id_pelatihan" name="id_pelatihan" required>
            <option value="" disabled selected>Pilih</option>
            @foreach ($pelatihan as $l)
            <option value="{{ $l->id }}" {{ old('id_pelatihan') == $l->id ? 'selected' : '' }}>
                {{ $l->judul }} - {{ $l->pelatihan }} - {{ $l->lokasi }}
            </option>
            @endforeach
        </select>
        @error('id_pelatihan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
        <select class="form-control @error('jeniskelamin') is-invalid @enderror" id="jeniskelamin" name="jeniskelamin" required>
            <option value="">Pilih</option>
            <option value="Laki-laki" {{ old('jeniskelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jeniskelamin')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label for="formFile" class="form-label">Unggah Foto</label>
    <input class="form-control @error('foto') is-invalid @enderror" name="foto" type="file" id="formFile" required>
    @error('foto')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

    <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">Registrasi</button>
    </div>

    <div class="text-center mt-3">
        <a href="/instruktur-login" class="text-decoration-none">Sudah memiliki akun? Login di sini</a>
    </div>
</form>

<script>
    document.getElementById('register-form').addEventListener('submit', function(event) {
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;

        if (password !== passwordConfirmation) {
            event.preventDefault();
            alert('Password dan Konfirmasi Password tidak cocok.');
        }
    });
</script>
@endsection
