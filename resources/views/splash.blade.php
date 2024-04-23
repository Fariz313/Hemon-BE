<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/splash.css') }}"> 
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @yield('add_head_script')
    
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-primary-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="/dashboard">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="125" height="25.5">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="head1">Pantau Kesehatan Jantungmu<br>Setiap Saat dengan Hemon</h3>
                <p class="txt">Diagnosis penyakit jantung melalui asesmen<br>dan konsultasi sederhana berdasarkan hasil diagnosis asesmen</p>
                <button id="btnSelengkapnya" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#description" aria-expanded="false" aria-controls="description">
                    Selengkapnya
                </button>
                <div class="collapse mt-3" id="description">
                    <p>
                        Tercatat hingga tahun 2024 penyakit jantung masih menjadi<br>
                        salah satu penyakit dengan angka kematian terbanyak di Indonesia.<br>
                        Oleh karena itu, Hemon atau Health Monitoring hadir sebagai aplikasi<br>
                        atau web untuk melakukan pemantauan kesehatan jantung.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('btnSelengkapnya').addEventListener('click', function() {
            this.style.display = 'none'; 
        });
    </script>

    <a class="image-section">
        <img src="{{ asset('images/Splash/Icon.png') }}" alt="Doc" width="400">
    </a>


    @yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>