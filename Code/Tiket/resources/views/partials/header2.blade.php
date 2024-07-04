<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Example</title>
    <style>
        /* Include the CSS adjustments here */
    </style>
</head>
<body>
<header id="header" class="navbar navbar-expand-lg navbar-light fixed-top">
    @if(session('success'))
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ url('assets/img/kbt.jpeg') }}" alt="Brand Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link ajax-link {{ request()->is('users/tiket') ? 'active' : '' }}" href="{{ route('users.tiket') }}" id="home-tab" role="tab" aria-controls="Pesan sekarang" aria-selected="true">PESAN SEKARANG</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link ajax-link {{ request()->is('users/pemesanan','users/pembayaran') ? 'active' : '' }}" href="{{ route('users.pemesanan') }}" id="profile-tab" role="tab" aria-controls="cara pemesanan dan pembayaran" aria-selected="false">CARA PEMESANAN &amp; PEMBAYARAN</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link ajax-link {{ request()->is('users/cek_pesanan') ? 'active' : '' }}" href="{{ route('users.cek_pesanan') }}" id="contact-tab" role="tab" aria-controls="cek pesanan" aria-selected="false">CEK PESANAN</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link ajax-link {{ request()->is('users/history') ? 'active' : '' }}" href="{{ route('users.history') }}" id="contact-tab" role="tab" aria-controls="history" aria-selected="false">HISTORY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-8 ajax-link {{ request()->is('users/barang') ? 'active' : '' }}" href="{{ route('users.barang') }}"><img src="{{ url('assets/img/barang.jpg') }}" alt="Barang" style="height: 50px;">KIRIM BARANG</a>
                </li>
            </ul>
            <div class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/img/profile_users.png')}}" alt="Profile" class="rounded-circle profile-img">
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->name }}</h6>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center ajax-link" href="{{ route('users.user-profile') }}">
                            <i class="bi bi-person"></i><span>&#x2003;My Profile</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center ajax-link" href="{{ route('guest.login') }}">
                            <i class="bi bi-box-arrow-right"></i><span>&#x2003;Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<main>
    <!-- Konten form login Anda di sini -->
    <div class="container mt-5">
        <form>
            <!-- Form login content here -->
        </form>
    </div>
</main>

<script>
    // Ambil alert yang memiliki id 'alert'
    var alert = document.getElementById('alert');

    // Setelah 1.5 detik, sembunyikan alert secara otomatis
    setTimeout(function() {
        alert.classList.add('d-none');
    }, 1500); // 1500 milidetik = 1.5 detik
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
