@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="card-title mb-3 text-center">Masuk</h4>

        <form action="{{ route('login.post') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" class="form-control" required>
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Login</button>
          </div>
        </form>

        <div class="mt-3 text-center">
          <small>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></small>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
