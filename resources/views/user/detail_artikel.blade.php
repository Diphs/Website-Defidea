<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/gambar/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style6.css') }}">
    <script src="{{ asset('assets/js/script.js') }}" defer></script>
    <title>Artikel</title>
</head>
<body>
    <nav id="header">
        <div class="nav-logo">
            <p class="nav-name">Dafidea</p>
        </div>
        <div class="nav-button">
            <a href="{{ route('login') }}" class="btn">Login Admin<i class="uil uil-file-alt"></i></a>
        </div>
    </nav>

        <div class="artikel-container">
            <div class="artikel-img">
                <img src="{{ asset('assets/gambar/' . $artikel->gambar_artikel) }}" alt="Artikel">
            </div>
            <div class="artikel-text">
                <h2 class="artikel-title">{{ $artikel->judul_artikel }}</h2>
                <span>{{ $artikel->tgl_terbit }}</span>
                <p>{{ $artikel->isi_artikel }}</p>
            </div>

            <h2>Tulis Komentar</h2>
            <form action="{{ route('home.store_comment', $artikel->id_artikel) }}" method="post">
                @csrf
                <div>
                    <label for="comment">Komentar:</label>
                    <textarea id="comment" name="comment" required></textarea>
                </div>
                <div>
                    <input type="submit" value="Kirim Komentar">
                </div>
            </form>

            @foreach($komentars as $komentar)
            <div class="comment">
                <p><strong>Tanggal:</strong> {{ $komentar->tgl_komentar }}</p>
                <p><strong>Komentar:</strong> {{ $komentar->isi_komentar }}</p>
            </div>
            @endforeach
        </div>

    <div class="komentar-container">
    </div>
</body>
</html>