@extends('auth.layout.main')
@section('container')
@auth('instruktur')
<div class="text-center mt-3">
    <a href="/regist-instruktur" class="text-decoration-none">sudah login</a>
</div>
@else
<form method="POST" action="/instruktur-login" class="mx-auto mt-5 p-4 shadow-lg rounded-3 bg-light" style="max-width: 400px;">
    @csrf
    <h2 class="text-center mb-4">Login Instruktur</h2>

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if($errors->has('loginError'))
    <div class=" text-center alert alert-danger">
        {{ $errors->first('loginError') }}
    </div>
    @endif

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input class="form-control" id="username" type="text" name="username" required>
    </div>

    <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input class="form-control" id="password" type="password" name="password" required>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">Login</button>
    </div>
    <div class="text-center mt-3">
        <a href="/regist-instruktur" class="text-decoration-none">Belum memiliki akun?</a>
    </div>

</form>
@endauth

@endsection