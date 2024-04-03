<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/gambar/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style4.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Dashboard</title>
</head>
<body>

<div class="sidebar">
    <div class="nav-logo">
        <p class="nav-name">Dafidea</p>
    </div>
    <div class="nav-menu">
        <li><a href="{{ route('dashboard') }}" class="nav-link-active"><i class="uil uil-estate"></i> Dashboard</a></li>
        <li><a href="{{ route('artikel') }}" class="nav-link"><i class="uil uil-layer-group"></i> Artikel</a></li>
        <li><a href="{{ route('logout') }}" class="nav-link-logout">Logout</a></li>
    </div>
</div>

<div class="main-content">
    <form action="{{ route('dashboard.search') }}" method="GET">
        <input type="text" name="keyword" class="search-bar" placeholder="Cari disini...">
    </form>

    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="boxes">
            <div class="box box1">
                <i class="uil uil-layer-group"></i>
                <span class="text">Artikel</span>
                <span class="number">{{ $jml_komentar }}</span>
            </div>
            <div class="box box2">
                <i class="uil uil-user"></i>
                <span class="text">Komentar</span>
                <span class="number">{{ $jml_artikel }}</span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Artikel terkini</div>
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Isi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->judul_artikel }}</td>
                    <td>{{ $article->tgl_terbit }}</td>
                    <td>{{ $article->isi_artikel }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
