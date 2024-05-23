<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header id="header" class="navbar navbar-expand-lg navbar-light fixed-top">
        @if(session('success'))
        <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ url('assets/img/kbt.jpeg') }}" alt="" class="brand-img">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('users/tiket*') ? 'active' : '' }}" href="{{ route('users.tiket') }}">PESAN SEKARANG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('users/pemesanan*','users/pembayaran*') ? 'active' : '' }}" href="{{ route('users.pemesanan') }}">CARA PEMESANAN & PEMBAYARAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('users/cek_pesanan*') ? 'active' : '' }}" href="{{ route('users.cek_pesanan') }}">CEK PESANAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('users/history*') ? 'active' : '' }}" href="{{ route('users.history') }}">HISTORY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('users/barang*') ? 'active' : '' }}" href="{{ route('users.barang') }}">
                            <img src="{{ url('assets/img/barang.jpg') }}" alt="" style="height: 60px;">KIRIM BARANG
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="{{ asset('assets/img/profile_users.png')}}" alt="Profile" class="rounded-circle profile-img">
                            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>{{ Auth::user()->name }}</h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('users.user-profile') }}">
                                    <i class="bi bi-person"></i>
                                    <span>&#x2003;My Profile</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('users.user-profile') }}">
                                    <i class="bi bi-gear"></i>
                                    <span>&#x2003;Account Settings</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('guest.login') }}">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>&#x2003;Sign Out</span>
                                </a>
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Ambil alert yang memiliki id 'alert'
        var alert = document.getElementById('alert');

        // Setelah 1.5 detik, sembunyikan alert secara otomatis
        setTimeout(function() {
            alert.classList.add('d-none');
        }, 1500); // 1500 milidetik = 1.5 detik
    </script>
</body>
</html>
