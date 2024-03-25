<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('storage/images/title.jpeg') }}" type="image/png">
    <!-- Link to Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    @include('partials.header')
    <div class="container3">
        <div class="card">
            <div class="card-body">
                <div class="login">
                    <h3>Login Member</h3>
                    <p>Selamat Datang</p>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                    @endif
                    <form method="POST" action=" {{ route("guest.login") }} ">
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
                        </script>
                        <button type="submit">LOGIN</button>
                    </form>
                    <p class="input-field1">Belum punya akun? <a href="{{ route('guest.registrasi') }}">Daftar Sekarang</a></p>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')

    <!-- Link to Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>