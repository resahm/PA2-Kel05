<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cara Pembayaran</title>
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
    <link href="{{ asset('assets/css/pembayaran.css') }}" rel="stylesheet">

</head>

<body>
    @include('partials.header2')

    <section class="page-single mt-100 mb-100">
        <div class="tabbable">
            <div class="nav-tabs">
                <div class="container">
                    <div class="row">
                        <ul class="nav ml-auto">
                            <li><a href="{{ route('users.pemesanan') }}">Cara Pemesanan</a></li>
                            <li><a href="{{route('users.pembayaran')}}" class="active">Cara Pembayaran</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="pemesananTabsContent">
                <div class="tab-pane fade show active" id="cara-pembayaran" role="tabpanel" aria-labelledby="cara-pembayaran-tab">
                    <div class="w-100">
                        <div class="container-holder step-item my-5">
                            <div class="container">
                                <div class="section-title mb-3">
                                    <h3 class="bold text-uppercase primary-color mb-2">Cara pembayaran</h3>
                                    <h6 class="bold text-uppercase gray-color">tersedia berbagai jenis pembayaran yang memudahkan anda</h6>
                                </div>

                                <div id="accordion" class="accordion">
                                    <div class="card mb-0">
                                        <div class="accordion-item">
                                            <div class="card-header collapsed" data-bs-toggle="collapse" data-bs-target="#collapse0">
                                                <a class="card-title bold">Transfer BNI</a>
                                            </div>
                                            <div id="collapse0" class="collapse" data-bs-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p><b>Pembayaran melalui BNI mobile banking </b></p>
                                                    <ol>
                                                        <li>Buka aplikasi mobile banking BNI</li>
                                                        <li>Pilih menu Transfer</li>
                                                        <li>Pilih rekening tujuan dan masukkan nomor rekening</li>
                                                        <li>Masukkan jumlah yang akan ditransfer</li>
                                                        <li>Konfirmasi data yang telah dimasukkan</li>
                                                        <li>Ikuti petunjuk untuk menyelesaikan transfer</li>
                                                    </ol>

                                                    <p><b>Pembayaran melalui bank BNI</b></p>
                                                    <ol>
                                                        <li>Kunjungi cabang atau ATM BNI terdekat</li>
                                                        <li>Ambil nomor antrian jika diperlukan</li>
                                                        <li>Berikan nomor rekening tujuan dan jumlah yang akan ditransfer kepada petugas atau di ATM</li>
                                                        <li>Konfirmasi data yang telah dimasukkan</li>
                                                        <li>Ikuti petunjuk dari petugas atau di layar ATM untuk menyelesaikan transfer</li>
                                                    </ol>
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
        </div>
    </section>

    @include('partials.footer2')

    <!-- Link to Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>