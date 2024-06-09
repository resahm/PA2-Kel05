<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pelanggan</title>
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
    <link href="{{ asset('assets/css/info_pelanggan.css')}}" rel="stylesheet">

</head>

<body>

    @include('partials.header2')

    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Tabel Data Pelanggan -->
        <div class="table-responsive mb-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Keberangkatan</th>
                        <th>Asal Keberangkatan</th>
                        <th>Tujuan Keberangkatan</th>
                        <th>Jumlah Penumpang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $latestTicket->tanggal_pemesanan }}</td>
                        <td>{{ $latestTicket->tanggal_keberangkatan }}</td>
                        <td>{{ $latestTicket->asal_keberangkatan }}</td>
                        <td>{{ $latestTicket->tujuan_keberangkatan }}</td>
                        <td>{{ $latestTicket->jumlah_penumpang }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="container">
            <div class="row mt-4" id="jadwal-container">
                <!-- Display the schedule -->
                @if ($jadwal_kbt->isNotEmpty())
                @foreach ($jadwal_kbt as $jadwal)
                <div class="col-12 col-md-6 col-lg-6 mb-4">
                    <!-- Card Container -->
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <!-- Schedule Information -->
                            <h5 class="card-title text-center mb-3">Jadwal Keberangkatan<br>{{ $jadwal->waktu_keberangkatan }}</h5>
                            <p class="card-text text-center kapasitas-kursi" data-id="{{ $jadwal->id }}">Tersedia: {{ $jadwal->kapasitas_kursi }}</p>

                            <!-- Form -->
                            <form action="{{ route('users.store_info_pelanggan') }}" method="POST" class="mt-auto">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $latestTicket->id }}">
                                <input type="hidden" name="waktu_keberangkatan" value="{{ $jadwal->waktu_keberangkatan }}">
                                <button type="submit" class="btn btn-primary w-100">Pilih</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-center">Tidak ada jadwal keberangkatan tersedia.</p>
                @endif
            </div>
        </div>

    </div>

    @include('partials.footer2')

    <!-- Include Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>