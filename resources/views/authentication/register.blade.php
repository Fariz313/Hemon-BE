@extends('template')

@section('title', 'Register')

@section('content')
    <div class="container my-5">
        <div class="row flex-row-reverse">
            <div class="col-md-6 d-flex justify-content-center">
                <img class="img-width-max-md" src="/images/doctor2.png" alt="" srcset="">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="w-100">
                    <h4 class="text-primary-h">Masuk akun Hemon.</h4>
                    <form id="form-register" onsubmit="event.preventDefault(); validateMyForm();">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input name="name" required type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                            <input name="email" required type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
                            <input name="password" required type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Ulangi Kata Sandi</label>
                            <input name="password_confirmation" required type="password" class="form-control"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check text-right">
                            <a href="#" class="text-muted">Lupa Password</a>
                        </div>
                        <button type="submit" class="btn  w-100 bg-primary-h text-light">Daftar</button>
                        <div class="text-muted w-100 text-center my-3">
                            Atau sudah punya akun?
                        </div>
                        <a href="/login" class="btn  w-100 bg-light text-primary-h"> <b>Masuk</b> </a>
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

        function validateMyForm() {
            const formData = $('form').serializeArray().reduce((acc, {
                name,
                value
            }) => ({
                ...acc,
                [name]: value
            }), {});
            $.post("/api/register", formData)
                .done(function(data) {
                    Swal.fire("Anda telah berhasil daftar silakan login!", "", "success").then(() => {
                        window.location.href = "/login";
                    });
                })
                .fail(function(error) {
                    console.log(error);
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: error.responseJSON.message,
                    });
                });
        }
    </script>
@endsection
