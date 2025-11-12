@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="row mb-4">
  <div class="col-12">
    <h3>Selamat Datang, {{ auth()->user()->name }} 👋</h3>
    <p class="text-muted">Selamat datang di sistem perpustakaan. Silakan pilih buku yang ingin kamu pinjam.</p>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-header bg-primary text-white">
    <h5 class="mb-0">Daftar Buku Tersedia</h5>
  </div>
  <div class="card-body">
    @if($books->count() > 0)
      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul Buku</th>
              <th>Kategori</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($books as $book)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->category->name ?? '-' }}</td>
                <td>{{ $book->stock }}</td>
                <td>
                  @if($book->stock > 0)
                    <form action="{{ route('student.borrow', $book->id) }}" method="POST" class="d-inline">
                      @csrf
                      <button class="btn btn-sm btn-success">Pinjam</button>
                    </form>
                  @else
                    <span class="badge bg-secondary">Habis</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <p class="text-center text-muted">Belum ada buku tersedia.</p>
    @endif
  </div>
</div>

<div class="mt-4">
  <a href="{{ route('student.borrows') }}" class="btn btn-outline-primary">Lihat Peminjaman Saya</a>
</div>
@endsection
