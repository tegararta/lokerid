@extends('fe.layout.main')
@section('container')
<form method="POST" action="/member-login" class="mx-auto mt-5 p-4 shadow-lg rounded-3 bg-light" style="max-width: 400px;">
    @csrf
    <h2 class="text-center mb-4">Login</h2>
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
        <a href="/member-register" class="text-decoration-none">Belum memiliki akun?</a>
    </div>
</form>

@endsection