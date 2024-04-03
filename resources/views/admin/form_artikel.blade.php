<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/gambar/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style5.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>From-Artikel</title>
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
    <div id="myModal" class="modal">
        <div class="modal-content">
        <form id="editArticleForm" action="{{ route('artikel.update', $article->id_artikel) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <h2>Edit Artikel</h2>
            <div class="form-group">
                <label for="articleImage">Gambar Artikel:</label>
                <input type="file" id="articleImage" name="articleImage" accept="image/*" onchange="previewImage(event)">
                <img id="preview" src="{{ asset('assets/gambar/' . $article->gambar_artikel) }}" alt="Image preview" style="max-width: 100%;">
            </div>
            <div class="form-group">
                <label for="articleTitle">Judul Artikel:</label>
                <input type="text" id="articleTitle" name="articleTitle" value="{{ $article->judul_artikel }}">
            </div>
            <div class="form-group">
                <label for="tanggal_publikasi">Tanggal Terbit</label>
                <input type="datetime-local" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="{{ $article->tgl_terbit }}" required>
            </div>
            <div class="form-group">
                <label for="articleContent">Isi Artikel:</label>
                <textarea id="articleContent" name="articleContent">{{ $article->isi_artikel }}</textarea>
            </div>
            <input class="btn-modal" type="submit" value="Simpan">
        </form>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
