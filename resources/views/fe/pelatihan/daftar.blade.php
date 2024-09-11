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
              <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="mb-3">
              <label for="nik" class="form-label">Nomor Induk Keluarga</label>
              <input type="text" class="form-control" id="nik" name="nik" required>
          </div>
          <div class="mb-3">
              <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
              <input type="text" class="form-control" id="ttl" name="ttl" required>
          </div>
          <div class="mb-3">
              <label for="agama" class="form-label">Agama</label>
              <input type="text" class="form-control" id="agama" name="agama" required>
          </div>
          <div class="mb-3">
              <label for="alamat" class="form-label">Alamat Rumah</label>
              <input type="text" class="form-control" id="alamat" name="alamat" required>
          </div>
          <div class="mb-3">
              <label for="alamatdom" class="form-label">Alamat Domisili (apabila tidak tinggal di alamat ktp)</label>
              <input type="text" class="form-control" id="alamatdom" name="alamatdom">
          </div>
          <div class="mb-3">
              <label for="pendidikan" class="form-label">Pendidikan</label>
              <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
          </div>
          <div class="mb-3">
              <label for="pekerjaan" class="form-label">Pekerjaan saat ini</label>
              <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
          </div>
          <!-- Alamat Email -->
          <div class="mb-3">
              <label for="nowa" class="form-label">Nomor Wa</label>
              <input type="number" class="form-control" id="nowa" name="nowa" required>
          </div>
          <div class="mb-3">
              <label for="terpadu" class="form-label">Data Terpadu kesejahteraan sosial (jika terdaftar)</label>
              <input type="number" class="form-control" id="terpadu" name="terpadu">
          </div>
          <div class="mb-3">
              <label class="form-label">Jenis Kelamin</label>
              <select class="form-select" name="kelamin" id="kelamin">
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
              </select>
          </div>
          <div class="mb-3">
              <label class="form-label">Status</label>
              <select class="form-select" name="status" id="status">
                  <option value="Menikah">Menikah</option>
                  <option value="Janda">Janda</option>
                  <option value="Belum Menikah">Belum Menikah</option>
                  <option value="Duda">Duda</option>
              </select>
          </div>
          <div class="mb-3">
              <label class="form-label">Jenis Klaster</label>
              <select class="form-select" name="klaster" id="klaster">
                  <option value="Anak">Anak</option>
                  <option value="Disabilitas">Disabilitas</option>
                  <option value="Lansia">Lansia</option>
                  <option value="Korban Bencana & Kedaruratan">Korban Bencana & Kedaruratan</option>
              </select>
          </div>
          <!-- Alat Musik Pilihan -->
          <div class="mb-3">
              <label for="pilihan" class="form-label">Judul - Pelatihan - Lokasi</label>
              <select class="form-select" id="id_pelatihan" name="id_pelatihan" required>
              <option value="" disabled selected>Pilih Pelatihan</option>
              @foreach ($pelatihan as $l)
              <option value="{{ $l->id }}">{{ $l->judul }} - {{ $l->pelatihan }} - {{ $l->lokasi }}</option>
              @endforeach
          </select>

          </div>
          <!-- Pengalaman -->
          <div class="mb-3">
              <label for="pdf" class="form-label">Lampirkan Dokumen (PDF)</label>
              <input class="form-control" name="pdf" type="file" id="pdf" accept=".pdf" required>
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