<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/gambar/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style4.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Artikel</title>
</head>
<body>

<div class="sidebar">
    <div class="nav-logo">
        <p class="nav-name">Dafidea</p>
    </div>
    <div class="nav-menu">
        <li><a href="{{ route('dashboard') }}" class="nav-link"><i class="uil uil-estate"></i> Dashboard</a></li>
        <li><a href="{{ route('artikel') }}" class="nav-link-active"><i class="uil uil-layer-group"></i> Artikel</a></li>
        <li><a href="{{ route('logout') }}" class="nav-link-logout">Logout</a></li>
    </div>
</div>

<div class="main-content">
    <form action="{{ route('artikel.search') }}" method="GET">
        <input type="text" name="keyword" class="search-bar" placeholder="Cari disini...">
    </form>
    <div class="card">
        <div class="card-header">Artikel terkini
            <button id="btn-artikel" class="btn-artikel">Tambah Artikel</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tangal</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->judul_artikel }}</td>
                    <td>{{ $article->tgl_terbit }}</td>
                    <td>{{ $article->isi_artikel }}</td>
                    <td>
                        <div class="button-container">
                            <button onclick="window.location='{{ route('artikel.edit', $article->id_artikel) }}'" class="btn">
                                <i class="material-icons">edit</i> Edit
                            </button>
                            <form id="deleteForm_{{ $article->id_artikel }}" action="{{ route('artikel.destroy', $article->id_artikel) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')"><i class="material-icons">delete</i> Hapus</button>
                            </form>
                        </div>                      
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="myArtikel" class="modal">
    <div class="modal-content">
        <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2>Tambah Artikel <span class="close1">&times;</span></h2>
            <div class="form-group">
                <label for="tambaharticleImage">Gambar Artikel:</label>
                <input type="file" id="tambaharticleImage" name="gambar_artikel" accept="image/*" onchange="tambahpreviewImage(event)">
                <img id="tambahpreview" src="{{ asset('/#') }}" alt="Image preview" style="max-width: 100%; display: none;">
            </div>
            <div class="form-group">
                <label for="tambaharticleTitle">Judul Artikel:</label>
                <input type="text" id="tambaharticleTitle" name="judul_artikel">
            </div>
            <div class="form-group">
                <label for="tambaharticleContent">Isi Artikel:</label>
                <textarea id="tambaharticleContent" name="isi_artikel"></textarea>
            </div>
            <input class="btn-modal" type="submit" value="Simpan">
        </form>
    </div>
</div>

<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
