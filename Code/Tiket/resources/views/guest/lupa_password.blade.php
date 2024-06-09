<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="icon" href="{{ asset('assets/img/kbt.png') }}" type="image/png">
    <link href="{{ asset('assets/css/tiket.css') }}" rel="stylesheet">

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
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lupa_password.css') }}" rel="stylesheet">

</head>

<body>
    @include('partials.header')

    @if (session('status'))
    <div>{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('send_reset_password_email') }}">
        @csrf
        <label for="email">Email Aktif</label><br>
        <div class="input-group">
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            <button type="submit">Reset Password</button>
            @error('email')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <p class="input-field1">Belum punya akun? <a href="{{ route('registrasi') }}">Daftar Sekarang</a></p>
        <p class="input-field2">atau <a href="{{ route('guest.login') }}">Login Saja</a></p>
    </form>

    @include('partials.footer')

</body>

</html>