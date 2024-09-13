@extends('fe.layout.main')
@section('container')
<br><br><br><br>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Calon Loker</title>
  <!-- Menggunakan Bootstrap CSS -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">

  {{-- <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f9fa;
      color: #495057;
    }

    .container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #007bff;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .hidden {
      display: none;
    }

    .info-box {
      background-color: #e9ecef;
      border-radius: 8px;
      padding: 15px;
      margin-top: 20px;
      display: none; /* Sembunyikan info-box secara default */
    }
  </style> --}}

</head>

<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Formulir Pendaftaran Pelatihan</h2>
        @if (Session::has('sukses'))
        <div class="alert alert-success" role="alert">
          {{ Session::get('sukses') }}
        </div>
        @endif
        <form action="{{ route('daftarpelatihan.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- Nama -->
          <div class="mb-3">
            <label for="namalengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $memberBiodata->nama ?? '') }}" required>
          </div>
          <div class="mb-3">
            <label for="nik" class="form-label">Nomor Induk Keluarga</label>
            <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nama', $memberBiodata->nik ?? '') }}"required>
          </div>
          <div class="mb-3">
            <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
            <input type="text" class="form-control" id="ttl" name="ttl" value="{{ old('nama', $memberBiodata->ttl ?? '') }}" required>
          </div>
          <div class="mb-3">
            <label for="usia" class="form-label">Usia</label>
            <input type="text" class="form-control" id="usia" name="usia" value="{{ old('nama', $memberBiodata->usia ?? '') }}"required>
          </div>
          <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select class="form-select" name="agama" id="agama value="{{ old('nama', $memberBiodata->agama ?? '') }}"">
              <option>pilih</option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Hindu">Hindu</option>
              <option value="Lainyya">Lainyya</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Rumah</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('nama', $memberBiodata->alamat ?? '') }}"required>
          </div>
          <div class="mb-3">
            <label for="alamatdom" class="form-label">Alamat Domisili (apabila tidak tinggal di alamat ktp)</label>
            <input type="text" class="form-control" id="alamatdom" name="alamatdom" value="{{ old('nama', $memberBiodata->alamatdom ?? '') }}">
          </div>
          <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{ old('nama', $memberBiodata->pendidikan ?? '') }}" required>
          </div>
          <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan saat ini</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ old('nama', $memberBiodata->pekerjaan ?? '') }}" required>
          </div>
          <!-- Alamat Email -->
          <div class="mb-3">
            <label for="nowa" class="form-label">Nomor Wa</label>
            <input type="number" class="form-control" id="nowa" name="nowa" value="{{ old('nama', $memberBiodata->nowa ?? '') }}" required>
          </div>
          <div class="mb-3">
            <label for="terpadu" class="form-label">Data Terpadu kesejahteraan sosial (jika terdaftar)</label>
            <input type="number" class="form-control" id="terpadu" name="terpadu" value="{{ old('nama', $memberBiodata->terpadu ?? '') }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="kelamin" id="kelamin">
              <option>Pilih</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" id="status">
              <option>Pilih</option>
              <option value="Menikah">Menikah</option>
              <option value="Janda">Janda</option>
              <option value="Belum Menikah">Belum Menikah</option>
              <option value="Duda">Duda</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Jenis Klaster</label>
            <select class="form-select" name="klaster" id="klaster">
              <option>Pilih</option>
              <option value="Anak">Anak</option>
              <option value="Disabilitas">Disabilitas</option>
              <option value="Lansia">Lansia</option>
              <option value="Korban Bencana & Kedaruratan">Korban Bencana & Kedaruratan</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select class="form-select" name="kelas" id="kelas">
              <option>Pilih</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Pelatihan</label>
            <select class="form-select" id="id_pelatihan" name="id_pelatihan" required>
              <option value="" disabled selected>Pilih Pelatihan</option>
              @foreach ($pelatihan as $l)
              <option value="{{ $l->id }}">{{ $l->judul }} - {{ $l->pelatihan }} - {{ $l->lokasi }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="pdf" class="form-label">Lampirkan Dokumen (PDF)</label>
            <input class="form-control" name="pdf" type="file" id="pdf" accept=".pdf" required>
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input class="form-control" name="foto" type="file" id="foto" accept=".png, .jpg, .jpeg" required>
          </div>
          <!-- Tombol Submit -->
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Daftar</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <br><br>

  <!-- Menggunakan Bootstrap JS -->
  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    // Fungsi untuk menampilkan/menyembunyikan informasi
    function toggleInfo() {
      var infoBox = document.getElementById("infoBox");
      infoBox.style.display = (infoBox.style.display === "none") ? "block" : "none";
    }
  </script>
</body>

</html>
@endsection