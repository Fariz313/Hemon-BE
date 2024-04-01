@extends('template')

@section('title', 'Form Produk')

@section('content')
    <h4 class="text-center" style="margin-top: 4rem; color: #49B5D8">Cek kesehatan jantung Anda</h4>
    <h4 class="text-center" style="margin-bottom: 2rem; color: #49B5D8">Silakan isi data berikut</h4>
    
    <form action="/assessment" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-3">
                
                <label for="age">Umur</label>
                <input id="age" type="number" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}"></input>

                @error('age')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <label for="blood_pressure">Tekanan Darah</label>
                <input id="blood_pressure" type="text" name="blood_pressure" class="form-control @error('blood_pressure') is-invalid @enderror" value="{{ old('blood_pressure') }}"></input>

                @error('blood_pressure')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <label for="cholesterol">Kolesterol</label>
                <input id="cholesterol" type="text" name="cholesterol" class="form-control @error('cholesterol') is-invalid @enderror" value="{{ old('cholesterol') }}"></input>

                @error('cholesterol')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <label for="blood_sugar">Gula Darah</label>
                <input id="blood_sugar" type="text" name="blood_sugar" class="form-control @error('blood_sugar') is-invalid @enderror" value="{{ old('blood_sugar') }}"></input>

                @error('blood_sugar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-3">
                <button class="btn text-center" style="background-color: #49B5D8; color: white;">Submit</button>
            </div>
        </div>

    
    </form>

</body>
</html>
@endsection