@extends('template')

@section('title', $title)

@section('user_name', $user->name)

@section('content')

    <h2 style="margin: 1rem; color: black;">Kumpulan Gerakan Senam Jantung</h2>
    <p style="margin-left: 1rem; color: #AAAAAA;">Lakukan gerakan senam secara baik dan benar</p>

    <div class="row justify-content-left">

    @foreach($workout_list as $w)

        <div class="col-md-3" style="margin: 1rem;">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <p style="font-size: 0.8rem; margin: 0rem; padding: 0rem">
                        
                        @foreach($finished_list as $f)
                            @if($f->workout_id == $w['id'])
                                Anda telah menyelesaikannya hari ini
                                @break
                            @endif
                        @endforeach
                        ...
                    </p>
                </div>

                <img class="card-img-top" src="{{ $w['img'] }}" alt="Workout Image" width="300" height="190">
                <div class="card-body">
                    <h5 class="card-title">{{ $w['name'] }}</h5>
                    <p class="card-text">{{ $w['desc'] }}</p>
                    
                    
                    
                    <a href="/senam/{{ $w['id'] }}" class="btn" style="background-color: #49B5D8;">Lakukan workout</a>
                    
                    
                        
                    
                </div>
            </div>
        </div>
        
        
        
    @endforeach
    </div>
@endsection