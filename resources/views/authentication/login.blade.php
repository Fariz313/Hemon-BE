@extends('template')

@section('title', 'Login')

@section('content')
    <div class="container my-5">
        <div class="row flex-row-reverse">
            <div class="col-md-6 d-flex justify-content-center">
                <img class="img-width-max-md" src="/images/doctor2.png" alt="" srcset="">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="w-100">
                    <h4 class="text-primary-h">Masuk akun Hemon.</h4>
                    <form id="form-login" method="post" action="login">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                            <input name="email" required type="email" class="form-control {{$errors->any() ? 'is-invalid' : ''}}" value="{{ old('email') }}" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <span class="invalid-feedback">
                                        <strong>{{ $error }}</strong>
                                    </span>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                            <input name="password" required type="password" class="form-control {{$errors->any() ? 'is-invalid' : ''}}" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check text-right">
                            <a href="#" class="text-muted">Lupa Password</a>
                        </div>
                        <button type="submit" disabled class="btn w-100 bg-primary-h text-light">Masuk</button>
                        <div class="text-muted w-100 text-center my-3">
                            Atau Belum Punya Akun
                        </div>
                        <a href="/register" class="btn  w-100 bg-light text-primary-h"> <b>Daftar</b> </a>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.btn').removeAttr('disabled');

        });
    </script>
@endsection
