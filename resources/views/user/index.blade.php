<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/gambar/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/script.js') }}" defer></script>
    <title>Home</title>
</head>
<body>
    <div class="container">
        <nav id="header">
            <div class="nav-logo">
                <p class="nav-name">Dafidea</p>
            </div>
            <div class="nav-button">
                <a href="{{ route('login') }}" class="btn">Login Admin<i class="uil uil-file-alt"></i></a>
            </div>
        </nav>
    
    <section id="blog">
        <div class="blog-heading">
            <h3>Berita Terkini</h3>
        </div>

        <div class="blog-container">
            @foreach ($artikels as $artikel)
            <div class="blog-box">
                <div class="blog-img">
                    <img src="{{ asset('assets/gambar/'. $artikel->gambar_artikel) }}" alt="Blog">
                </div>
                <div class="blog-text">
                    <a href="{{ route('home.detail', $artikel->id_artikel) }}" class="blog-title">{{ $artikel->judul_artikel }}</a>
                    <span>{{ $artikel->tgl_terbit }}</span>
                    <p>{{ $artikel->isi_artikel }}</p>
                    <a href="{{ route('home.detail', $artikel->id_artikel) }}">Read More</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</body>
</html>