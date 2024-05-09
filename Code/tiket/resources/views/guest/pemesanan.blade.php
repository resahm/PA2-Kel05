<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cara Pemesanan dan Pembayaran</title>
    <link rel="icon" href="{{ asset('storage/images/title.jpeg') }}" type="image/png">
    <!-- Link to Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/pemesanan.css') }}">
</head>

<body>
    @include('partials.header')

    <section class="page-single mt-100 mb-100">
        <div class="tabbable">
            <div class="nav-tabs">
                <div class="container">
                    <div class="row">
                        <ul class="nav ml-auto">
                            <li><a href="#cara-pemesanan" data-toggle="tab" class="active">Cara Pemesanan</a></li>
                            <li><a href="#cara-pembayaran" data-toggle="tab">Cara Pembayaran</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane active" id="cara-pemesanan">

                    <div class="w-100">
                        <div class="container-holder step-item my-5">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-8 col-12 step-w">
                                        <div class="step-number">
                                            1
                                        </div>
                                        <div class="img-step">
                                            <div class="blue-box">
                                                <img src="{{ url('storage/images/1.jpg') }}" class="img-100 float-right">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 d-flex justify-content-center align-items-center">
                                        <div class="w-100">
                                            <h3 class="primary-color bold mb-3">Pilih Rute</h3>

                                            <p>Pilih Rute Perjalanan Anda ,Tersedia
                                                penjemputan jika keberangkatan
                                                melalui Loket, Jangan lupa untuk mengisi
                                                tanggal Keberangkatan & Jumlah Penumpang</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="container-holder step-item my-5">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-8 col-12 step-w">
                                        <div class="step-number">
                                            2
                                        </div>
                                        <div class="img-step">
                                            <div class="blue-box">
                                                <img src="assets/img/step-2.png" class="img-100 float-left">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 d-flex justify-content-center align-items-center">
                                        <div class="w-100">
                                            <h3 class="primary-color bold mb-3">Lengkapi Info<br>Keberangkatan Anda</h3>

                                            <p class="mb-0">Isi Nama Penumpang, dan Alamat Jemput/Antar*</p>
                                            <p>Lalu Pilih Jam yang tersedia</p>

                                            <div class="f-small gray-color">*Layanan Jemput/Antar hanya tersedia pada keberangkatan melalui
                                                Loket</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="container-holder step-item my-5">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-8 col-12 step-w">
                                        <div class="step-number">
                                            3
                                        </div>
                                        <div class="img-step">
                                            <div class="blue-box">
                                                <img src="assets/img/step-3.png" class="img-100 float-right">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 d-flex justify-content-center align-items-center">
                                        <div class="w-100">
                                            <h3 class="primary-color bold mb-3">Pilih Kursi</h3>

                                            <p>Pilih kursi, dan cek tagihan anda,
                                                lalu Klik Bayar untuk menyelesaikan
                                                pesanan. tukarkan Poin untuk
                                                potongan harga di setiap Perjalanan.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="container-holder step-item my-5">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-8 col-12 step-w">
                                        <div class="step-number">
                                            4
                                        </div>
                                        <div class="img-step">
                                            <div class="blue-box">
                                                <img src="assets/img/step-4.png" class="img-100 float-left">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 d-flex justify-content-center align-items-center">
                                        <div class="w-100">
                                            <h3 class="primary-color bold mb-3">Terima Tiket Anda</h3>

                                            <p>Lunasi tiket anda dengan berbagai
                                                metode pembayaran yang telah di sediakan</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="cara-pembayaran">

                    <div class="container">
                        <div class="section-title mb-3">
                            <h3 class="bold text-uppercase primary-color mb-2">Cara pembayaran</h3>
                            <h6 class="bold text-uppercase gray-color">tersedia berbagai jenis pembayaran yang memudahkan anda</h6>
                        </div>

                        <div id="accordion" class="accordion">
                            <div class="card mb-0">
                                <div class="accordion-item">
                                    <div class="card-header collapsed" data-toggle="collapse" href="#collapse0">
                                        <a class="card-title bold">
                                            CIMB Virtual Account </a>
                                    </div>
                                    <div id="collapse0" class="card-body collapse" data-parent="#accordion">
                                        <p style="margin-top:0cm"><b><span style="font-family: Calibri, sans-serif; font-size: 14px;">Pembayaran VA melalui ATM CIMB
                                                    NIAGA</span></b><span style="font-family: Calibri, sans-serif; font-size: 14px;"></span></p>
                                        <p></p>
                                        <p></p>
                                        <p style="margin-top: 0cm;"><span style="font-family: Calibri, sans-serif; font-size: 14px;">1.
                                                Masukan kartu ATM dan PIN CIMB Niaga Anda<br>
                                                2. Pilih Menu Pembayaran<br>
                                                3. Pilih Virtual Account<br>
                                                4. Masukkan NOMOR VIRTUAL ACCOUNT<br>
                                                5. Muncul nama dan nominal billing di layar konfirmasi<br>
                                                6. Pilih OK untuk payment</span></p>
                                        <p></p>
                                        <p></p>
                                        <p style="margin-top: 0cm;"><span style="font-family: Calibri, sans-serif; font-size: 14px;">
                                                <br>
                                                <b>Pembayaran VA melalui OCTO Clicks</b></span></p>
                                        <p></p>
                                        <p></p>
                                        <p style="margin-top: 0cm;"><span style="font-family: Calibri, sans-serif; font-size: 14px;">1.
                                                Login ke OCTO Clicks<br>
                                                2. Pilih menu Pembayaran Tagihan<br>
                                                3. Pilih kategori Mobile Rekening Virtual<br>
                                                4. Masukkan nomor Virtual Account Anda<br>
                                                5. Tekan tombol 'lanjut untuk verifikasi detail'<br>
                                                6. Tekan tombol 'kirim OTP untuk lanjut'<br>
                                                7. Masukkan OTP yang dikirimkan ke nomor HP anda<br>
                                                8. Tekan tombol 'Konfirmasi'</span></p>
                                        <p></p>
                                        <p></p>
                                        <p style="margin-top: 0cm;"><span style="font-family: Calibri, sans-serif; font-size: 14px;">
                                                <br>
                                                <b>Pembayaran VA melalui OCTO MOBILE</b></span></p>
                                        <p></p>
                                        <p></p>
                                        <p style="margin-top: 0cm;"><span style="font-family: Calibri, sans-serif; font-size: 14px;">1.
                                                Login ke Octo Mobile<br>
                                                2. Pilih menu TRANSFER &gt; Transfer to Other CIMB Niaga Account<br>
                                                3. Pilih rekening sumber anda: CASA atau Rekening Ponsel<br>
                                                4. Masukkan nomor Virtual Account Anda pada kolom Transfer To<br>
                                                5. Masukkan jumlah amount sesuai tagihan<br>
                                                6. Ikuti instruksi untuk menyelesaikan transaksi</span></p>
                                        <p></p>
                                        <p></p>
                                        <p>
                                            <font style="color: rgb(76, 76, 76); font-family: Roboto; font-size: 14px;"></font>
                                        </p>
                                        <p class="MsoNormal"></p>
                                        <p>
                                            <font style="font-size: 14px;"> </font>
                                        </p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <!-- Link to Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>