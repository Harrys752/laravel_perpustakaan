@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white text-center">
        <h4 class="mb-0">Login</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('login.post') }}">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>

        <div class="text-center mt-3">
          <small>Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></small>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
