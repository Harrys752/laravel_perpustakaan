<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Perpustakaan Mini' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }
        .navbar {
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        .card {
            border-radius: 12px;
        }
        .btn-primary {
            border-radius: 20px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">📚 Perpustakaan</a>

        <ul class="navbar-nav ms-auto">

            @auth
                @if(auth()->user()->role == 'admin')
                    <li class="nav-item"><a class="nav-link" href="/admin/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/books">Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="/categories">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="/students">Siswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="/loans">Peminjaman</a></li>

                @elseif(auth()->user()->role == 'siswa')
                    <li class="nav-item"><a class="nav-link" href="/siswa/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/siswa/books">Lihat Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="/siswa/my-loans">Pinjaman Saya</a></li>
                @endif

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm ms-3">Logout</button>
                    </form>
                </li>
            @endauth

        </ul>
    </div>
</nav>

<div class="container py-4">
    @yield('content')
</div>

</body>
</html>
