@extends('fe.layout.main')
@section('container')
<style>
        .card-custom {
            background-color: #f1f1f1;
            border-radius: 10px;
            padding: 30px;
            margin: 10px;
            text-align: center;
            
        }
        .hoverku:hover{
            background: #C1DDF6;
            
        }
        .hidden {
            display: none;
        }
</style>

<div class="container text-center mt-5">
    <h2>Sentra Budi Perkasa</h2>
    <p class="text-muted">Disabilitas dan difabel merupakan istilah yang menggambarkan keterbatasan seseorang untuk melakukan aktivitas tertentu. Meski secara garis besar sama, ada sedikit perbedaan di antara keduanya. Terkadang, salah dalam menempatkan kata-kata tersebut dapat menimbulkan sentimen yang berbeda.</p>
    <div class="input-group mb-4">
        <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" aria-label="Masukkan Kata Kunci" id="searchInput" onkeyup="filterTraining()">
    </div>
    <div class="row" id="trainingList">
        @foreach ($infopel as $ip)
        <div class="col-md-4">
            <a class="text-decoration-none text-dark" href="{{ route('infopelatihan.show', $ip->id) }}">
                <div class="card-custom hoverku" data-name="Komputer">
                    {{ $ip->pelatihan }}
                </div>
            </a>
        </div>
    @endforeach
    
    </div>
</div>

<script>
    function filterTraining() {
        var input, filter, cards, i;
        input = document.getElementById('searchInput');
        filter = input.value.toLowerCase();
        cards = document.querySelectorAll('#trainingList .card-custom');

        cards.forEach(function(card) {
            var name = card.getAttribute('data-name').toLowerCase();
            if (name.includes(filter)) {
                card.parentElement.classList.remove('hidden');
            } else {
                card.parentElement.classList.add('hidden');
            }
        });
    }
</script>

@endsection