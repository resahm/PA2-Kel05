<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Your Email</title>
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

    <link href="{{ asset('assets/css/check_email.css') }}" rel="stylesheet">

</head>

<body>
    @include('partials.header')
    @if (session('status'))
    <div>{{ session('status') }}</div>
    @endif
    <div class="card">
        <h1>Check Your Email</h1>
        <p>We have sent a password reset link to your email. Please check your inbox and follow the instructions to reset your password.</p>
        <p class="input-field2"><a href="{{ route('guest.login') }}">Login Sekarang</a></p>
    </div>
    @include('partials.footer')

</body>

</html>