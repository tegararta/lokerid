@extends('fe.layout.main')
@section('container')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .job-card {
            border: 1px solid #e2c49e;
            border-left: 5px solid #e2c49e;
            border-radius: 0.375rem;
            padding: 1rem;
            margin-bottom: 1rem;
            min-height: 300px;
        }
        .job-card .company-logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 1rem;
        }
        .job-card .job-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #0d6efd;
        }
        .job-card .company-name {
            color: #6c757d;
        }
        .job-card .job-details {
            color: #6c757d;
        }
        .job-card .btn-custom {
            background-color: #e2c49e;
            color: #000;
            border: none;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            text-transform: uppercase;
        }
        .job-card .btn-custom:hover {
            background-color: #d0a36c;
        }

        /* Custom Button */
        .btn-orange {
            background-color: #ff5722;
            color: white;
        }

        .btn-orange:hover {
            background-color: #e64a19;
        }

        /* Ensure full width for the button */
        .btn-custom {
            width: 100%;
        }

    </style>
</head>
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
                    @if ($loker->count() > 0)
                    @foreach ($loker as $l)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 job-card-wrapper">
                            <div class="job-card p-3 border d-flex flex-column h-100">
                                <div class="d-flex flex-column flex-md-row flex-grow-1">
                                    <img src="/img/loker/{{ $l->foto }}" alt="Company Logo" class="company-logo me-3 mb-3 mb-md-0" style="width: 100px; height: 100px;">
                                    <div class="flex-grow-1 d-flex flex-column">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div>
                                            <div class="job-title h5 text-wrap" style="max-width: 70%; word-wrap: break-word; overflow-wrap: break-word;">
                                                {{ $l->judul }}
                                            </div>

                                                <div class="company-name text-muted text-truncate">{{ $l->nama }}</div>
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
                                            <a href="/daftarloker" class="mt-auto"><button class="btn btn-custom w-100">Daftar</button></a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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