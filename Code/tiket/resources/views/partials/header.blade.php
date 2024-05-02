<head>
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
</head>
<nav id="header" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <!-- Navbar Logo -->
                <li class="nav-item flex-fill" role="presentation">
                    <a class="navbar-brand" href="#"><img src="{{ url('assets/img/kbt.jpeg') }}" alt="" style="height: 100px;"></a>
                </li>

                <!-- Menu Pesan Sekarang -->
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('guest/login*') ? 'active' : '' }}" href="{{ route('guest.login') }}" role="tab" aria-controls="Pesan sekarang" aria-selected="true">PESAN SEKARANG</a>
                </li>

                <!-- Menu Cara Pemesanan -->
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('guest/pemesanan*', 'guest/pembayaran*') ? 'active' : '' }}" href="{{ route('guest.pemesanan') }}" role="tab" aria-controls="cara pemesanan dan pembayaran" aria-selected="false">CARA PEMESANAN &amp; PEMBAYARAN</a>
                </li>

                <!-- Menu Cek Pesanan -->
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('guest/login*') ? 'active' : '' }}" href="{{ route('guest.login') }}" role="tab" aria-controls="cek pesanan" aria-selected="false">CEK PESANAN</a>
                </li>

                <!-- Menu Login Member -->
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('guest/login*') ? 'active' : '' }}" href="{{ route('guest.login') }}" role="tab" aria-controls="login member" aria-selected="false">LOGIN MEMBER</a>
                </li>

                <!-- Menu Kirim Barang -->
                <li class="nav-item">
                    <a class="nav-link fs-8 {{ request()->is('guest/login*') ? 'active' : '' }}" href="{{ route('guest.login') }}"><img src="{{ url('assets/img/barang.jpg') }}" alt="" style="height: 60px;">KIRIM BARANG</a>
                </li>
            </ul>
        </div>
    </div>
</nav>