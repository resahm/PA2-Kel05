<head>
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
</head>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                    <a class="navbar-brand" href="#"><img src="{{ url('storage/images/kbt.jpeg') }}" alt="" style="height: 70px;"></a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100" href="{{ route('guest.login') }}" id="home-tab" role="tab" aria-controls="Pesan sekarang" aria-selected="true">PESAN SEKARANG</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100" href="{{ route('guest.pemesanan') }}" id="profile-tab" role="tab" aria-controls="cara pemesanan dan pembayaran" aria-selected="false">CARA PEMESANAN &amp; PEMBAYARAN</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100" href="{{ route('guest.login') }}" id="contact-tab" role="tab" aria-controls="cek pesanan" aria-selected="false">CEK PESANAN</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100" href="{{ route('guest.login') }}" id="contact-tab" role="tab" aria-controls="login member" aria-selected="false">LOGIN MEMBER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-8" href="#"><img src="{{ url('assets/img/barang.jpg') }}" alt="" style="height: 60px;">KIRIM BARANG</a>
                </li>
            </ul>
        </div>
    </div>
</nav>