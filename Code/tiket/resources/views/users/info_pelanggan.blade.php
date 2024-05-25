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
                    @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->tanggal_pemesanan }}</td>
                        <td>{{ $ticket->tanggal_keberangkatan }}</td>
                        <td>{{ $ticket->asal_keberangkatan }}</td>
                        <td>{{ $ticket->tujuan_keberangkatan }}</td>
                        <td>{{ $ticket->jumlah_penumpang }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Form -->
        <form action="{{ route('users.store_info_pelanggan') }}" method="POST">
            @csrf
            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
            <div class="mb-3">
                <label for="waktu_keberangkatan" class="form-label">Waktu Keberangkatan</label>
                <input type="time" id="waktu_keberangkatan" name="waktu_keberangkatan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    @include('partials.footer2')

    <!-- Include Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>