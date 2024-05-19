@extends('template')

@section('title', 'Dashboard')

@section('user_name', auth()->user()->name)

@section('add_head_script')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
    <h3 class="head1">Halo, {{ auth()->user()->name }}</h3>
    <h4 class="head2">Pantau Kesehatan Jantungmu<br>Setiap Saat dengan Hemon</h4>
    <p class="txt">Diagnosis penyakit jantung melalui asesmen<br>dan konsultasi sederhana berdasarkan hasil diagnosis asesmen</p>

    <a class="image-section1">
        <img src="{{ asset('images/Dashboard/Doctor.png') }}" alt="Doc" width="400">
    </a>

    <a class="image-section2">
        <img src="{{ asset('images/Dashboard/IconRightBot.png') }}" alt="Doc" width="250">
    </a>

    <a class="image-section3">
        <img src="{{ asset('images/Dashboard/IconLeftBot.png') }}" alt="Doc" width="150">
    </a>

    <div class="container">
    <div class="texts">
        <h2 class="texts1">Layanan Asesmen</h2>
        <h2 class="texts2">Konsultasi</h2>
    </div>
    <div class="boxes">
        <a href="/assessment" class="box">
            <img src="{{ asset('images/Dashboard/HeartCare.png') }}" alt="Doc" width="25">
            <p>Lakukan Asesmen Sekarang</p>
        </a>
        <a href="/consult" class="box">
            <img src="{{ asset('images/Dashboard/Robot.png') }}" alt="Doc" width="25">
            <p>Ajukan Pertanyaan</p>
        </a>
    </div>
</div>





@endsection