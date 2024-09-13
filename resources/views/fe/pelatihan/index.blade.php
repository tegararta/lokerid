@extends('fe.layout.main')
@section('container')
<body>
    <div class="container mt-4">
        <div class="row g-3">
            <div class="container mt-4">
                <!-- Form Pencarian -->
                <form id="searchForm" class="d-flex mb-4">
                    <input id="searchInput" class="form-control me-2" type="search" placeholder="Masukkan kata kunci" aria-label="Search">
                    <button class="btn btn-orange" type="submit"><i class="bi bi-search"></i></button>
                </form>
            
                <!-- Daftar Pekerjaan -->
                <div class="row" id="jobList">
                    @if ($pelatihan->count() > 0)
                    @foreach ($pelatihan as $l)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 job-card-wrapper">
                            <div class="job-card p-3 border d-flex flex-column h-100">
                                <div class="d-flex flex-column flex-md-row flex-grow-1">
                                    <img src="/img/pelatihan/{{ $l->foto }}" alt="Company Logo" class="company-logo me-3 mb-3 mb-md-0" style="width: 100px; height: 100px;">
                                    <div class="flex-grow-1 d-flex flex-column">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div>
                                            <div class="job-title h5 text-wrap" style="max-width: 70%; overflow-wrap: break-word;">
                                               Pelatihan {{ $l->pelatihan }}
                                            </div>         
                                                <div class="company-name text-muted text-truncate text-wrap">{{ $l->nama }}</div>
                                            </div>
                                        </div>
                                        <div class="job-details flex-grow-1">
                                            <div class="text-truncate">{{ $l->pekerjaan }}</div>
                                            <div>Lokasi: {{ $l->lokasi }}</div>
                                            <p id="text1" class="mt-2 text-break">
                                                {{$l->deskripsi}}
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <a href="/daftarpelatihan" class="mt-auto"><button class="btn btn-custom w-100">Daftar</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div class="border p-5">
                    <div style="" class="text-center fw-bold">
                        <div class="notification">
                            <i class="fas fa-info-circle fa-lg"></i>
                            Belum ada data yang diunggah.
                        </div>
                    </div>
                </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var paragraph = document.getElementById("text");
            var maxLength = 120;
    
            if (paragraph.textContent.length > maxLength) {
                paragraph.textContent = paragraph.textContent.substring(0, maxLength) + '...';
            }
        });
    </script>

<script>
    document.getElementById('searchForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah form submit
    
        var input = document.getElementById('searchInput').value.toLowerCase();
        var jobCards = document.getElementsByClassName('job-card-wrapper');
    
        for (var i = 0; i < jobCards.length; i++) {
            var jobCard = jobCards[i];
            var title = jobCard.getElementsByClassName('job-title')[0].innerText.toLowerCase();
            var company = jobCard.getElementsByClassName('company-name')[0].innerText.toLowerCase();
            var pekerjaan = jobCard.getElementsByClassName('job-details')[0].innerText.toLowerCase();
            var lokasi = jobCard.getElementsByClassName('job-details')[0].innerText.toLowerCase();
    
            if (title.includes(input) || company.includes(input) || pekerjaan.includes(input) || lokasi.includes(input)) {
                jobCard.style.display = 'block';
            } else {
                jobCard.style.display = 'none';
            }
        }
    });
    </script>
    
    
</body>
</html>

@endsection