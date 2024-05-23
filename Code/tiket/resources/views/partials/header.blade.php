<head>
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
</head>
<nav id="header" class="navbar navbar-expand-lg navbar-dark fixed-top">
    @if(session('success'))
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ url('assets/img/kbt.jpeg') }}" alt="" style="height: 60px; margin-right: 20px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Menu Pesan Sekarang -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('guest/login*') ? 'active' : '' }}" href="{{ route('guest.login') }}" aria-selected="true">PESAN SEKARANG</a>
                </li>
                <!-- Menu Cara Pemesanan -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('guest/pemesanan*', 'guest/pembayaran*') ? 'active' : '' }}" href="{{ route('guest.pemesanan') }}" aria-selected="false">CARA PEMESANAN &amp; PEMBAYARAN</a>
                </li>
                <!-- Menu Cek Pesanan -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('guest/login*') ? 'active' : '' }}" href="{{ route('guest.login') }}" aria-selected="false">CEK PESANAN</a>
                </li>
                <!-- Menu Login Member -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('guest/login*') ? 'active' : '' }}" href="{{ route('guest.login') }}" aria-selected="false">LOGIN</a>
                </li>
                <!-- Menu Kirim Barang -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('guest/login*') ? 'active' : '' }}" href="{{ route('guest.login') }}">
                        <img src="{{ url('assets/img/barang.jpg') }}" alt="" style="height: 40px; vertical-align: middle;">KIRIM BARANG
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    // Ambil alert yang memiliki id 'alert'
    var alert = document.getElementById('alert');

    // Setelah 3 detik, sembunyikan alert secara otomatis
    setTimeout(function() {
        alert.classList.add('d-none');
    }, 1500); // 3000 milidetik = 3 detik
</script>
