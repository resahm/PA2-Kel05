<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cara Pemesanan dan Pembayaran</title>
    <link rel="icon" href="{{ asset('assets/img/kbt.png') }}" type="image/png">
    <!-- Link to Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/pemesanan.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tiket.css') }}">
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
    <link href="{{ asset('assets/css/pemesanan.css') }}" rel="stylesheet">

</head>

<body>
    @include('partials.header2')

    <section class="page-single mt-100 mb-100">
        <div class="tabbable">
            <div class="nav-tabs">
                <div class="container">
                    <div class="row">
                        <ul class="nav ml-auto">
                            <li><a href="{{route('users.pemesanan')}}" class="active">Cara Pemesanan</a></li>
                            <li><a href="{{route('users.pembayaran')}}">Cara Pembayaran</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="pemesananTabsContent">
                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="cara-pemesanan-tab">

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
                                                <img src="{{ asset('assets/img/bagan1.png') }}" class="img-100 float-right">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 d-flex justify-content-center align-items-center">
                                        <div class="w-100">
                                            <h3 class="primary-color bold mb-3">Pilih Perjalanan</h3>

                                            <p>Pilih Rute Perjalanan Anda, tersedia layanan
                                                penjemputan jika keberangkatan melalui loket.
                                                Pastikan untuk mengisi tanggal keberangkatan d
                                                an jumlah penumpang.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="container-holder step-item my-5">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-4 col-12 d-flex justify-content-center align-items-center">
                                        <div class="w-100">
                                            <h3 class="primary-color bold mb-3">Lengkapi Info<br>Keberangkatan Anda</h3>

                                            <p class="mb-0">Isi Nama Penumpang, dan Alamat Jemput/Antar*</p>
                                            <p>Lalu Pilih Jam yang tersedia</p>

                                            <div class="f-small gray-color">*Layanan Jemput/Antar hanya tersedia pada keberangkatan melalui
                                                Loket</div>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-12 step-w">
                                        <div class="step-number">
                                            2
                                        </div>
                                        <div class="img-step">
                                            <div class="blue-box">
                                                <img src="{{ asset('assets/img/bagan2.png') }}" class="img-100 float-left">
                                            </div>
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

                                    <div class="col-md-4 col-12 d-flex justify-content-center align-items-center">
                                        <div class="w-100">
                                            <h3 class="primary-color bold mb-3">Terima Tiket Anda</h3>

                                            <p>Lunasi tiket anda dengan berbagai
                                                metode pembayaran yang telah di sediakan</p>
                                        </div>
                                    </div>

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

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @include('partials.footer2')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>