<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Example</title>
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
</head>
<body>
<nav id="header" class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <!-- Navbar Logo -->
                <li class="nav-item flex-fill" role="presentation">
                    <a class="navbar-brand" href="#"><img src="{{ url('assets/img/kbt.jpeg') }}" alt="Brand Logo" style="height: 100px; margin-right: 30px;"></a>
                </li>

                <!-- Menu Pesan Sekarang -->
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('#') ? 'active' : '' }}" href="{{ route('guest.login') }}" role="tab" aria-controls="Pesan sekarang" aria-selected="true">PESAN SEKARANG</a>
                </li>

                <!-- Menu Cara Pemesanan -->
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('pemesanan*') || request()->is('pembayaran*') ? 'active' : '' }}" href="{{ route('guest.pemesanan') }}" role="tab" aria-controls="cara pemesanan dan pembayaran" aria-selected="false">CARA PEMESANAN &amp; PEMBAYARAN</a>
                </li>

                <!-- Menu Cek Pesanan -->
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('#') ? 'active' : '' }}" href="{{ route('guest.login') }}" role="tab" aria-controls="cek pesanan" aria-selected="false">CEK PESANAN</a>
                </li>

                <!-- Menu Login Member -->
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('/') ? 'active' : '' }}" href="{{ route('guest.login') }}" role="tab" aria-controls="login member" aria-selected="false">LOGIN</a>
                </li>

                <!-- Menu Kirim Barang -->
                <li class="nav-item">
                    <a class="nav-link fs-8 {{ request()->is('#') ? 'active' : '' }}" href="{{ route('guest.login') }}"><img src="{{ url('assets/img/barang.jpg') }}" alt="Kirim Barang" style="height: 60px;">KIRIM BARANG</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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
