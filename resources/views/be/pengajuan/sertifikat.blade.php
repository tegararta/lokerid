@extends('be.partials.main')
@section('container')

<div class="container">
    <h1>Pilih Member untuk Mengunggah Sertifikat</h1>

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
    <!-- Form untuk memilih member -->
    <form action="{{ route('sertifikat.tampil') }}" method="GET">
        <div class="mb-3">
            <label for="member" class="form-label">Pilih Member</label>
            <select class="form-select" id="member" name="member_id" required>
                <option disabled selected value="">Pilih Member</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}" 
                        @if($member->sertifikat) disabled @endif>
                        {{ $member->username }}
                        @if($member->sertifikat) - Sudah memiliki sertifikat @endif
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Pilih Member</button>
    </form>
</div>

@endsection