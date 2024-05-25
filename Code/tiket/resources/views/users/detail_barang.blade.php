<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Paket</title>
    <link rel="icon" href="{{ asset('assets/img/kbt.png') }}" type="image/png">
    <!-- Link to Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/tiket.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
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
    <link href="{{ asset('assets/css/detail_barang.css') }}" rel="stylesheet">

</head>

<body>

    @include('partials.header2')
    <main id="main" class="main">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="container">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Detail Paket</h1>
                </div>

                <!-- Tabel untuk menampilkan data -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Berat</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Pengirim</th>
                            <th>Penerima</th>
                            <th>Deskripsi</th>
                            <th>Waktu Kedatangan</th>
                            <th>Waktu Keberangkatan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($packages))
                        @foreach($packages as $key => $package)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $package->nama_paket }}</td>
                            <td>{{ $package->berat }}</td>
                            <td>{{ $package->harga }}</td>
                            <td>{{ $package->kategori }}</td>
                            <td>{{ $package->name_pengirim }}</td>
                            <td>{{ $package->name_penerima }}</td>
                            <td>{{ $package->deskripsi }}</td>
                            <td>{{ $package->waktu_kedatangan }}</td>
                            <td>{{ $package->waktu_keberangkatan }}</td>
                            <td>
                                @if($package->status == 'Pending')
                                <span class="badge badge-warning">Pending</span>
                                @elseif($package->status == 'Success')
                                <span class="badge badge-success">Success</span>
                                @elseif($package->status == 'Failed')
                                <span class="badge badge-danger">Failed</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
    </main>
    @include('partials.footer2')

    <!-- Link to Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>