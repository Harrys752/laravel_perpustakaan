@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="card-title mb-3 text-center">Daftar Akun Baru</h4>

        <form action="{{ route('register.post') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="role" class="form-label">Daftar Sebagai</label>
            <select id="role" name="role" class="form-select" required>
              <option value="">-- Pilih Peran --</option>
              <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
              <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
            </select>
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-success" type="submit">Daftar</button>
          </div>
        </form>

        <div class="mt-3 text-center">
          <small>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></small>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
