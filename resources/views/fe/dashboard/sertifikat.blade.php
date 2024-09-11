@extends('fe.profil.partials.main')
@section('container')
<div class="container">
    <h1>Sertifikat Anda</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card p-4 border border-3 shadow-lg h-100">
        <div class="text-center">
            @if($member && $member->sertifikat)
                <!-- Tampilkan gambar sertifikat -->
                <img id="sertifikat-image" src="{{ asset($member->sertifikat) }}" alt="Sertifikat" class="w-50 h-50 justify-start">

                <!-- Link untuk mengunduh sertifikat sebagai PDF -->
                <button id="download-btn" class="btn btn-primary mt-3">Unduh Sertifikat (PDF)</button>
            @else
                <p>Anda belum memiliki sertifikat.</p>
            @endif
        </div>
    </div>
</div>

<!-- Versi terbaru dari jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
    document.getElementById('download-btn').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;
        
        // Buat PDF dalam orientasi landscape
        var pdf = new jsPDF('l', 'mm', 'a4');

        // Ambil gambar sertifikat
        var imgElement = document.getElementById('sertifikat-image');
        var imgURL = imgElement.src;

        // Buat objek gambar baru
        var img = new Image();
        img.src = imgURL;

        img.onload = function () {
            // Hitung skala gambar sesuai dengan halaman A4
            var imgWidth = this.width * 0.264583; // Ubah dari pixel ke mm
            var imgHeight = this.height * 0.264583;

            // Sesuaikan gambar ke ukuran A4 (landscape)
            var pageWidth = pdf.internal.pageSize.getWidth();
            var pageHeight = pdf.internal.pageSize.getHeight();
            var ratio = Math.min(pageWidth / imgWidth, pageHeight / imgHeight);
            var finalWidth = imgWidth * ratio;
            var finalHeight = imgHeight * ratio;
            var xOffset = (pageWidth - finalWidth) / 2;
            var yOffset = (pageHeight - finalHeight) / 2;

            // Tambahkan gambar ke PDF
            pdf.addImage(img, 'JPEG', xOffset, yOffset, finalWidth, finalHeight);

            // Simpan PDF dengan ukuran yang disesuaikan
            pdf.save('sertifikat.pdf');
        };

        img.onerror = function () {
            alert('Gagal memuat gambar.');
        };
    });
</script>

@endsection
