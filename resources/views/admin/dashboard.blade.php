@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="row mb-4">
  <div class="col-12">
    <h3>Selamat Datang, {{ auth()->user()->name }} 👋</h3>
    <p class="text-muted">Berikut ringkasan data perpustakaan:</p>
  </div>
</div>

<div class="row g-3">
  <div class="col-md-3">
    <div class="card text-bg-primary shadow-sm">
      <div class="card-body text-center">
        <h4>{{ $bookCount }}</h4>
        <p class="mb-0">Total Buku</p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card text-bg-success shadow-sm">
      <div class="card-body text-center">
        <h4>{{ $categoryCount }}</h4>
        <p class="mb-0">Kategori</p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card text-bg-warning shadow-sm">
      <div class="card-body text-center">
        <h4>{{ $studentCount }}</h4>
        <p class="mb-0">Siswa Terdaftar</p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card text-bg-danger shadow-sm">
      <div class="card-body text-center">
        <h4>{{ $borrowCount }}</h4>
        <p class="mb-0">Total Peminjaman</p>
      </div>
    </div>
  </div>
</div>

<div class="mt-4">
  <a href="{{ route('admin.books.index') }}" class="btn btn-outline-primary me-2">Kelola Buku</a>
  <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-success me-2">Kelola Kategori</a>
  <a href="{{ route('admin.borrows.index') }}" class="btn btn-outline-danger">Kelola Peminjaman</a>
</div>
@endsection
