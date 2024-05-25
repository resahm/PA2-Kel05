<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Informasi Pelanggan</title>
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
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Keberangkatan</th>
                        <th>Asal Keberangkatan</th>
                        <th>Tujuan Keberangkatan</th>
                        <th>Jumlah Penumpang</th>
                        <th>Waktu Keberangkatan</th>
                        <th>Nomor Kursi</th>
                        <th>Nomor Kendaraan</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $latestTicket->tanggal_pemesanan }}</td>
                        <td>{{ $latestTicket->tanggal_keberangkatan }}</td>
                        <td>{{ $latestTicket->asal_keberangkatan }}</td>
                        <td>{{ $latestTicket->tujuan_keberangkatan }}</td>
                        <td>{{ $latestTicket->jumlah_penumpang }}</td>
                        <td>{{ $latestTicket->waktu_keberangkatan }}</td>
                        <td>{{ $latestTicket->nomor_kursi }}</td>
                        <td>{{ $latestTicket->nomor_kendaraan }}</td>
                        <td>{{ $latestTicket->kelas }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Card for Ticket Information -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Detail Harga Tiket</h5>
                <p class="card-text">Jumlah Penumpang: {{ $latestTicket->jumlah_penumpang }}</p>

                @php
                $hargaTiket = App\Models\DetailTiket::where('asal_keberangkatan', $latestTicket->asal_keberangkatan)
                ->where('tujuan_keberangkatan', $latestTicket->tujuan_keberangkatan)
                ->value('harga');
                $totalHarga = $hargaTiket * $latestTicket->jumlah_penumpang;
                @endphp

                <p class="card-text">Kelas: {{ $latestTicket->kelas }}</p>
                @php
                $detailTiket = App\Models\DetailTiket::where('asal_keberangkatan', $latestTicket->asal_keberangkatan)
                ->where('tujuan_keberangkatan', $latestTicket->tujuan_keberangkatan)
                ->where('kelas', $latestTicket->kelas) // Tambahkan kondisi kelas
                ->first();

                if ($detailTiket) {
                $hargaTiket = $detailTiket->harga;
                $metodePembayaran = $detailTiket->metode_pembayaran;
                } else {
                $hargaTiket = 0;
                $metodePembayaran = 'N/A'; // Atau Anda dapat menangani ini sesuai kebutuhan
                }

                $totalHarga = $hargaTiket * $latestTicket->jumlah_penumpang;
                @endphp
                <p class="card-text">Harga Tiket: {{ $hargaTiket }}</p>
                <p class="card-text">Total Harga: {{ $totalHarga }}</p>
                <p class="card-text">Metode Pembayaran:
                    @php
                    $metodePembayaran = App\Models\DetailTiket::where('asal_keberangkatan', $latestTicket->asal_keberangkatan)
                    ->where('tujuan_keberangkatan', $latestTicket->tujuan_keberangkatan)
                    ->value('metode_pembayaran');
                    echo $metodePembayaran;
                    @endphp
                    (1514981141)</p>

                <div style="display: flex; justify-content: space-between;">
                    <div>
                        <form action="{{ route('users.store_bukti_pembayaran_alt') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{ $latestTicket->id }}">
                            <input type="hidden" name="total_harga" value="{{ $totalHarga }}">
                            <input type="hidden" name="metode_pembayaran" value="{{ $metodePembayaran }}">
                            <button type="submit" class="btn btn-primary">Isi Bukti Pembayaran</button>
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