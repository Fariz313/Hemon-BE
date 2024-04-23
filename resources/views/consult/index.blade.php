@extends('template')

@section('title', $title)

@section('content')

@section('user_name', $user->name)

    @csrf

    <div class="row justify-content-left">
    
    @foreach($opposite_users as $opp)
        <div class="col-md-3">
            <div class="card" style="margin: 1rem;">
                <div class="card-body">
                    <h2 class="card-title">Konsul dengan {{ $opp->name }}</h2>
                    <p class="card-text">Klik mulai chat untuk melakukan percakapan</p>

                    <form method="POST" action="/consult/start">
                        @csrf

                        <!-- { }} -->
                        @if($user->role == 'user')
                            <input type="hidden" name="user_email" value="{{ $user->email }}">
                            <input type="hidden" name="doctor_email" value="{{ $opp->email }}">
                        @else
                            <input type="hidden" name="user_email" value="{{ $opp->email }}">
                            <input type="hidden" name="doctor_email" value="{{ $user->email }}">
                        @endif
                        <button type="submit" class="btn" style="background-color: #49B5D8;">Mulai Chat</button>
                    </form>

                </div>
            </div>
        </div>
        
    @endforeach
        
    

    <!-- <div class="col-md-3">
        <div class="card" style="margin: 1rem;">
            <div class="card-body">
                <h2 class="card-title">Konsul dengan User Rama</h2>
                <p class="card-text">Rama adalah mahasiswa</p>

                <form method="POST" action="/consult/start">
                    @csrf
                    <input type="hidden" name="user_email" value="user@mail.com">
                    <input type="hidden" name="doctor_email" value="doctor@mail.com">
                    <input type="hidden" name="me" value="Doctor">
                    <button type="submit" class="btn" style="background-color: #49B5D8;">Mulai Chat</button>
                </form>

            </div>
        </div>
    </div> -->
        
    </div>
@endsection