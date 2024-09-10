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
      <h2 class="text-center mb-4">Formulir Pendaftaran Loker</h2>
      @if (Session::has('sukses'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('sukses') }}
        </div>
        @endif
      <form action="{{ route('daftarloker.store') }}" method="POST">
        @csrf
        <!-- Nama -->
        <div class="mb-3">
          <label for="namalengkap" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
          <label for="namalengkap" class="form-label">Tempat Tanggal Lahir</label>
          <input type="text" class="form-control" id="nama" name="ttl" required>
        </div>

        <!-- Alamat Email -->
        <div class="mb-3">
          <label for="email" class="form-label">Nomor Wa</label>
          <input type="number" class="form-control" id="email" name="nowa" required>
        </div>

        <!-- Alat Musik Pilihan -->
        <div class="mb-3">
          <label for="alatMusik" class="form-label">Judul - Pekerjaan - lokasi</label>
          <select class="form-select" id="alatMusik" name="pilihan" required>
            <option value="" disabled selected>Pilih Pekerjaan</option>
            @foreach ($loker as $l)
            <option value="{{ $l->judul }} - {{ $l->pekerjaan }} - {{ $l->lokasi }}">{{ $l->judul }} - {{ $l->pekerjaan }} - {{ $l->lokasi }}</option>
            @endforeach
            <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
          </select>
        </div>

        <!-- Pengalaman -->
        <div class="mb-3">
          <label for="pengalaman" class="form-label">Pengalaman kerja (jika ada)</label>
          <textarea class="form-control" id="pengalaman" name="pengalaman" rows="3"></textarea>
        </div>

        <!-- Tombol Pencetan untuk Menampilkan Informasi -->
        {{-- <button type="button" class="btn btn-warning mb-3" onclick="toggleInfo()">Persyaratan</button>

        <!-- Informasi Persyaratan dan Proses Seleksi -->
        <div class="info-box" id="infoBox">
          <h5>Informasi Persyaratan dan Proses Seleksi</h5>
          <p>
            Calon anggota band diharapkan memiliki pengetahuan dasar dalam memainkan alat musik pilihan dan
            dapat berkolaborasi dengan anggota band lainnya. Proses seleksi melibatkan audisi.
            Pastikan untuk mempersiapkan diri sebaik baiknya karena akan dilakukan pemfilteran best of the best.
          </p>
        </div> --}}


        <div class="row">
          <div class="col d-flex justify-content-between">
          {{-- <div>
            <a class="btn btn-warning" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Syarat & Ketentuan
          </a>
        </div> --}}
           <!-- Tombol Submit -->
        <div>
          <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
          </div>

        </div>
        {{-- <div class="collapse" id="collapseExample">
          <div class="card card-body">
           Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit ratione corporis dolores cumque odit iusto maiores, saepe harum ex, repellendus voluptatem suscipit amet. Adipisci dicta eos molestias similique commodi nihil!
          </div>
        </div> --}}

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