@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-header bg-success text-white text-center">
        <h4 class="mb-0">Register Akun Baru</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('register.post') }}">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Daftar Sebagai</label>
            <select name="role" class="form-select" required>
              <option value="">-- Pilih Role --</option>
              <option value="admin">Admin</option>
              <option value="siswa">Siswa</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success w-100">Daftar</button>
        </form>

        <div class="text-center mt-3">
          <small>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></small>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
