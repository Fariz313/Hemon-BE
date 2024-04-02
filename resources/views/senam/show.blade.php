@extends('template')

@section('title', $title)

@section('content')

    <h2 style="margin: 1rem; color: #49B5D8;">Lakukan Gerakan dengan Baik dan Benar</h2>
    <p style="margin-left: 1rem; color: #49B5D8;">Semangat bapak, ibu, adik, kakak! Semoga sehat selalu :D</p>

    <div class="position-relative">
        <div class="row position-absolute top-50 start-50 translate-middle">


    
            <div class="col-md-3" style="margin: 1rem;">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $workout_details[$id]['img'] }}" alt="Workout Image" width="300" height="190">
                    <div class="card-body">
                        <h5 class="card-title">{{ $workout_details[$id]['name'] }}</h5>

                        <p class="card-text">Langkah:</p>
                        <ol>
                        @foreach($workout_details[$id]['step'] as $step)
                            <li>{{ $step }}</li>
                        @endforeach
                        </ol>
                        
                        <form action="/senam" method="post">
                            @csrf
                            <input type="hidden" name="workout_id" value="{{ $id }}">
                            <button type="submit" class="btn" style="background-color: #49B5D8;">Selesai</button>
                        </form>
                        
                            
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
    
@endsection