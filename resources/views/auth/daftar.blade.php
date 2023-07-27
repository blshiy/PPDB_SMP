<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PPDB - Buat Akun</title>
    @include('template.style')
</head>

<body>


    <div id="auth" class="d-flex justify-content-center align-items-center">

        <div class="row h-100">
            <div class="col-lg-12 col-12">
                <div id="auth-left">
                    <div class="auth-logo mb-4">
                        <a href="index.html"><img src="{{('assets/dashboard/assets/images/logo-ppdb.png')}}" alt="Logo"></a>
                    </div>
                    <h1>Selamat Datang.</h1>
                    <p>Silahkan Login untuk dapat mengakses sistem!</p>

<form action="{{route('daftar.procces')}}" method="POST">
    @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Email" name="email">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Nama Lengkap" name="name">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
<div class="form-group position-relative has-icon-left mb-4">
    <input type="password" class="form-control form-control-xl" placeholder="Konfirmasi Password" name="password_confirmation">
    <div class="form-control-icon">
        <i class="bi bi-shield-lock"></i>
    </div>
</div>

                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Buat Akun</button>
            </form>

                    <div class="text-center mt-3 text-sm fs-6">
                        <p class="text-gray-600">Sudah Memiliki Akun ? <a href="{{route('login')}}" class="font-bold">Masuk Disini</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
    @include('template.scripts')


</body>

</html>
