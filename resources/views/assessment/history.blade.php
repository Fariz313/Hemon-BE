@extends('template')

@section('title', $title)

@section('content')

    @csrf

    <a href="/assessment/create" class="btn btn-warning" style="margin: 1rem 1rem 0px;">Mulai Asesmen Baru</a>

    <div class="row justify-content-left">
    @foreach($assessments as $a)
        
        <div class="col-md-3">
            <div class="card text-white bg-info" style="margin: 1rem;">
                <div class="card-header">{{ $a->created_at->setTimezone('Asia/Jakarta') }}</div>
                <div class="card-body">
                    <h2 class="card-title">{{ $a->result }}</h2>
                    <p class="card-text">Umur: {{ $a->age }}</p>
                    <p class="card-text">Tekanan Darah: {{ $a->blood_pressure }}</p>
                    <p class="card-text">Kolesterol: {{ $a->cholesterol }}</p>
                    <p class="card-text">Gula Darah: {{ $a->blood_sugar }}</p>
                </div>
            </div>
        </div>
        
    @endforeach
    </div>
@endsection