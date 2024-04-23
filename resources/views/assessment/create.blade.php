@extends('template')

@section('user_name', $user->name)
@section('title', 'Form Produk')

@section('add_head_script')
    <link rel="stylesheet" href="{{ asset('css/asesmen.css') }}">
@endsection

@section('content')
    <h4 class="head" style="margin-top: 4rem">Cek kondisi jantung anda.</h4>
    <h4 class="head" style="margin-bottom: 2rem">Silakan isi data berikut.</h4>
    
    <form action="/assessment" method="post">
        @csrf
        <div class="row left-align">
            <div class="col-md-4">
                
                <label for="age" style="margin-bottom: 5px;">Umur</label>
                <input id="age"  style="margin-bottom: 5px;" type="number" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}"  placeholder="Umur (Isi tanpa tahun, contoh : 20)"></input>

                @error('age')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row left-align">
            <div class="col-md-4">
                <label for="blood_pressure" style="margin-bottom: 5px;">Tekanan Darah</label>
                <input id="blood_pressure" style="margin-bottom: 5px;" type="text" name="blood_pressure" class="form-control @error('blood_pressure') is-invalid @enderror" value="{{ old('blood_pressure') }}" placeholder="Dalam sistolik (Contoh 120)"></input>

                @error('blood_pressure')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row left-align">
            <div class="col-md-4">
                <label for="cholesterol" style="margin-bottom: 5px;">Kolesterol</label>
                <input id="cholesterol" style="margin-bottom: 5px;" type="text" name="cholesterol" class="form-control @error('cholesterol') is-invalid @enderror" value="{{ old('cholesterol') }}" placeholder="Dalam mm/dl (Contoh 120 mm/dl, isi 120)"></input>

                @error('cholesterol')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row left-align">
            <div class="col-md-4">
                <label for="blood_sugar" style="margin-bottom: 5px;">Gula Darah</label>
                <input id="blood_sugar" type="text" name="blood_sugar" class="form-control @error('blood_sugar') is-invalid @enderror" value="{{ old('blood_sugar') }}" placeholder="Dalam mm/dl (Contoh 120 mm/dl, isi 120)"></input>

                @error('blood_sugar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row left-align">
            <div class="col-4">
                <button class="btn text-center" style="background-color: #49B5D8; color: white;">Submit</button>
            </div>
        </div>
    </form>

    <a class="image-section">
        <img src="{{ asset('images/Asesmen/DoctorAses.png') }}" alt="Doc" width="450">
    </a>

<body style="overflow-x: hidden;">
</body>
</html>
@endsection