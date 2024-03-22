<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('storage/images/title.jpeg') }}" type="image/png">
    <!-- Link to Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tiket.css') }}">
</head>

<body>

    <head>
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
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
                        <a class="nav-link fs-8" href="#"><img src="{{ url('storage/images/barang.jpg') }}" alt="" style="height: 60px;">KIRIM BARANG</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <h2>Saya</h2>
    </div>

    <body>
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    </body>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Menu</h5>
                    <ul class="list-unstyled">
                        <li class="nav-item flex-fill" role="presentation">
                            <a class="nav-link w-100" href="{{ route('guest.login') }}">PESAN SEKARANG</a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <a class="nav-link w-100" href="{{ route('guest.pemesanan') }}">CARA PEMESANAN &amp; PEMBAYARAN</a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <a class="nav-link w-100" href="{{ route('guest.login') }}">CEK PESANAN</a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <a class="nav-link w-100" href="{{ route('guest.login') }}">LOGIN MEMBER</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Tentang Kami</h5>
                    <p>Deskripsi singkat tentang KBT Ticketing.</p>
                </div>
                <div class="col-md-4">
                    <h1>Lokasi</h1>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15946.0324645234!2d99.04470916336494!3d2.3340948195615274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0467255c798d%3A0x9896f86133d40be3!2sLoket%20KBT%20Balige!5e0!3m2!1sid!2sus!4v1709163458736!5m2!1sid!2sus" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <p class="text-center">&copy; <?php echo date('Y'); ?> KBT Ticketing. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Link to Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>