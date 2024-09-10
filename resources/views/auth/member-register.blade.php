@extends('fe.layout.main')
@section('container')

<form method="POST" action="/member-register" class="mx-auto mt-5 p-4 shadow-lg rounded-3 bg-light" style="max-width: 400px;" id="register-form">
    @csrf
    <h2 class="text-center mb-4">Register</h2>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input class="form-control" id="username" type="text" name="username" required value="{{ old('username') }}">
    </div>

    <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input class="form-control" id="password" type="password" name="password" required>
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input class="form-control" id="password_confirmation" type="password" required>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">Register</button>
    </div>

    <div class="text-center mt-3">
        <a href="/member-login" class="text-decoration-none">Sudah memiliki akun? Login di sini</a>
    </div>
</form>

<script>
    document.getElementById('register-form').addEventListener('submit', function(event) {
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;

        if (password !== passwordConfirmation) {
            event.preventDefault();
            alert('Password dan Konfirmasi Password tidak cocok.');
        }
    });
</script>
@endsection