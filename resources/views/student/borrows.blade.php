@extends('layouts.app')

@section('title', 'Peminjaman Saya')

@section('content')
<div class="row mb-4">
  <div class="col-12">
    <h3>Peminjaman Saya 📚</h3>
    <p class="text-muted">Berikut daftar buku yang sedang dan sudah kamu pinjam.</p>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-header bg-primary text-white">
    <h5 class="mb-0">Riwayat Peminjaman</h5>
  </div>
  <div class="card-body">
    @if($borrows->count() > 0)
      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul Buku</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($borrows as $borrow)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $borrow->book->title ?? '-' }}</td>
                <td>{{ $borrow->borrowed_at->format('d M Y') }}</td>
                <td>{{ $borrow->returned_at ? $borrow->returned_at->format('d M Y') : '-' }}</td>
                <td>
                  @if($borrow->returned_at)
                    <span class="badge bg-success">Dikembalikan</span>
                  @else
                    <span class="badge bg-warning text-dark">Dipinjam</span>
                  @endif
                </td>
                <td>
                  @if(!$borrow->returned_at)
                    <form action="{{ route('student.return', $borrow->id) }}" method="POST" class="d-inline">
                      @csrf
                      <button class="btn btn-sm btn-danger">Kembalikan</button>
                    </form>
                  @else
                    <span class="text-muted">Selesai</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <p class="text-center text-muted">Kamu belum pernah meminjam buku.</p>
    @endif
  </div>
</div>

<div class="mt-4">
  <a href="{{ route('student.dashboard') }}" class="btn btn-outline-secondary">⬅ Kembali ke Dashboard</a>
</div>
@endsection
