@extends('template')

@section('title', 'Riwayat Asesmen')

@section('content')

    @csrf

    <div class="row justify-content-left">
    
        
    <div class="col-md-3">
        <div class="card text-white bg-info" style="margin: 1rem;">
            <div class="card-body">
                <h2 class="card-title">Konsul dengan dr.Sayid</h2>
                <p class="card-text">dr.Sayid adalah dokter telyu</p>

                <form method="POST" action="/consult/start">
                    @csrf
                    <input type="hidden" name="user_email" value="user@mail.com">
                    <input type="hidden" name="doctor_email" value="doctor@mail.com">
                    <input type="hidden" name="me" value="User">
                    <button type="submit">Mulai Chat</button>
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info" style="margin: 1rem;">
            <div class="card-body">
                <h2 class="card-title">Konsul dengan User Rama</h2>
                <p class="card-text">Rama adalah mahasiswa</p>

                <form method="POST" action="/consult/start">
                    @csrf
                    <input type="hidden" name="user_email" value="user@mail.com">
                    <input type="hidden" name="doctor_email" value="doctor@mail.com">
                    <input type="hidden" name="me" value="Doctor">
                    <button type="submit">Mulai Chat</button>
                </form>

            </div>
        </div>
    </div>
        
    </div>
@endsection