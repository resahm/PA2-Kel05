<body>
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .col-md-4 a i {
            font-size: 30px;
            /* Ubah ukuran ikon sesuai kebutuhan */
            margin-right: 10px;
            /* Berikan margin kanan antara ikon */
        }
    </style>
</body>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Menu</h5>
                <ul class="list-unstyled">
                    <li class="nav-item flex-fill" role="presentation">
                        <a class="nav-link w-100" href="{{ route('users.tiket') }}">PESAN SEKARANG</a>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <a class="nav-link w-100" href="{{ route('users.pemesanan') }}">CARA PEMESANAN &amp; PEMBAYARAN</a>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <a class="nav-link w-100" href="{{ route('guest.login') }}">CEK PESANAN</a>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <a class="nav-link w-100" href="{{ route('guest.login') }}">HISTORY</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Tentang Kami</h5>
                <a href="https://web.facebook.com/groups/202854083764182?locale=id_ID"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/koperasibintangtapanuli"><i class="fab fa-instagram"></i></a>
                <a href="https://www.twitter.com/koperasibintangtapanuli"><i class="fab fa-twitter"></i></a>
                <a href="https://www.tiktok.com/@koperasibintangtapanuli"><i class="fab fa-tiktok"></i></a>
                <a href="tel:+6281234567890"><i class="fas fa-phone"></i></a>
            </div>
            <div class="col-md-4">
                <h5>Lokasi</h5>
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