<!DOCTYPE html>
<html lang="en">

<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- <link rel="stylesheet" href="{{ asset('css/template.css') }}">  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @yield('add_head_script')
</head>

<body style="height:100vh">

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#49B5D8;">
        <a class="text-white navbar-brand" href="/dashboard">HEM<i class="bi bi-heart-pulse-fill"></i>N</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
            
            @if(isset(auth()->user()->name))
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="text-white nav-link" href="/assessment">Asesmen</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link" href="/consult">Konsultasi</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link" href="/chatbot">Chatbot</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link" href="/senam">Senam</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link" href="/klinik">Klinik</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link" href="/tracking">Tracking</a>
                </li>
                
            </ul>
                <span class="text-white navbar-text">
                    Selamat datang, @yield('user_name')
                </span>
                <a class="text-light nav-link" href="/logout">Logout</a>
            @endif
        </div>
    </nav>

    @yield('content')

    
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('js')
