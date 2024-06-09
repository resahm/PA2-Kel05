<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Paket</title>
    <link rel="icon" href="{{ asset('assets/img/kbt.png') }}" type="image/png">

    <!-- Link to Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link to Custom CSS -->
    <link href="{{ asset('assets/css/tiket.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/pilih_kursi.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/terima_tiket.css') }}" rel="stylesheet">

</head>

<body>

    @include('partials.header2')

    <div class="container2">

        <div class="table-responsive mb-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama Paket</th>
                        <th>Berat</th>
                        <th>Harga Paket</th>
                        <th>Kategori</th>
                        <th>ID Pengirim</th>
                        <th>ID Penerima</th>
                        <th>Deskripsi</th>
                        <th>Waktu Kedatangan</th>
                        <th>Waktu Keberangkatan</th>
                    </tr>
                </thead>
                <tbody>
                    @if($paket)
                    <tr>
                        <td>{{ $paket->nama_paket }}</td>
                        <td>{{ $paket->berat }}</td>
                        <td>{{ $paket->harga }}</td>
                        <td>{{ $paket->kategori }}</td>
                        <td>{{ $paket->id_pengirim }}</td>
                        <td>{{ $paket->id_penerima }}</td>
                        <td>{{ $paket->deskripsi }}</td>
                        <td>{{ $paket->waktu_kedatangan }}</td>
                        <td>{{ $paket->waktu_keberangkatan }}</td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="9">No paket found</td>
                    </tr>
                    @endif
                </tbody>

            </table>
        </div>

        <!-- Card for Ticket Information -->
        <div class="card mb-4">
            <div class="card-body">
                <p class="card-text">Metode Pembayaran: Transfer Bank BNI (1514981141)</p>
                <div style="display: flex; justify-content: space-between;">
                    <div>
                        <form action="{{ route('users.store_pembayaran_paket') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Bukti Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('partials.footer2')

    <!-- Include Bootstrap JavaScript from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>