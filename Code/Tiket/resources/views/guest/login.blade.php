<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{ asset('assets/img/kbt.png') }}" type="image/png">
    <link href="{{ asset('assets/css/tiket.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>
    @include('partials.header')
    <div class="container3">
        <div class="card">
            <div class="card-body">
                <div class="login">
                    <h3>Login</h3>
                    <p>Selamat Datang</p>
                    @if(session('success'))
                    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                    @endif
                    <form method="POST" action=" {{ route('guest.login') }} ">
                        @csrf
                        <div class="input-field">
                            <label for="email">EMAIL</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="input-field">
                            <label for="password">PASSWORD</label>
                            <input type="password" id="password" name="password" required>
                            <i class="password-toggle far fa-eye" onclick="togglePasswordVisibility('password')"></i>
                        </div>
                        <button type="submit">LOGIN</button>
                    </form>
                    <p class="input-field2"><a href="{{ route('guest.lupa_password') }}">Lupa Password</a></p>
                    <p class="input-field1">Belum punya akun? <a href="{{ route('registrasi') }}">Daftar Sekarang</a></p>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')

    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                document.querySelector('.password-toggle').classList.remove('fa-eye');
                document.querySelector('.password-toggle').classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                document.querySelector('.password-toggle').classList.remove('fa-eye-slash');
                document.querySelector('.password-toggle').classList.add('fa-eye');
            }
        }

        // Ambil alert yang memiliki id 'alert'
        var alert = document.getElementById('alert');

        // Setelah 3 detik, sembunyikan alert secara otomatis
        setTimeout(function() {
            alert.classList.add('d-none');
        }, 1500);
    </script>

    <!-- Link to Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

</body>

</html>
