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

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

<script>
    document.getElementById('download-btn').addEventListener('click', function () {
        // Ambil elemen gambar sertifikat
        var imgElement = document.getElementById('sertifikat-image');

        html2canvas(imgElement).then(function (canvas) {
            // Dapatkan dimensi gambar asli
            var imgWidth = canvas.width;
            var imgHeight = canvas.height;

            // Hitung skala untuk menyesuaikan dengan PDF
            var pdfWidth = imgWidth * 0.264583; // Ubah dari pixel ke mm (1 px = 0.264583 mm)
            var pdfHeight = imgHeight * 0.264583;

            // Buat PDF dalam orientasi landscape
            var pdf = new jsPDF('l', 'mm', [pdfWidth, pdfHeight]);

            // Tambahkan gambar ke PDF
            var imgData = canvas.toDataURL('image/png');
            pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);

            // Simpan PDF dengan ukuran yang disesuaikan
            pdf.save('sertifikat.pdf');
        });
    });
</script>


@endsection