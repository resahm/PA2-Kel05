<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Booking KBT</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/img/kbt.png') }}" type="image/png">

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

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/kendaraan.css') }}" rel="stylesheet">

    <style>
        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4e73df;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4e73df;
            color: #fff;
        }

        .sidebar-brand-icon img {
            transform: rotate(15deg);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            height: 50px;
        }

        .sidebar-brand img {
            width: auto;
            height: 100%;
            max-width: 40px;
            margin-right: 10px;
        }

        .sidebar-brand-text {
            margin-top: 5px;
            /* Sesuaikan margin sesuai kebutuhan */
        }

        .border-left-purple {
            border-left: 0.25rem solid #800080;
            /* Warna ungu (#800080) */
        }

        .text-purple {
            color: #800080;
        }

        .status-pending {
            color: black;
        }

        .status-accepted {
            color: green;
        }

        .status-rejected {
            color: red;
        }

        .btn-accept,
        .btn-reject {
            background-color: #4e73df;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-reject {
            background-color: #e74a3b;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Informasi KBT</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Tiket</li>
                    <li class="breadcrumb-item active">Kendaraan KBT</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="container">
                <div class="bus-container">
                    <h1 class="title">Denah KBT</h1>
                    <div class="bus-top-view">
                        <div class="seat-row">
                            <div class="seat green" data-seat-number="1" onclick="bookSeat(1)">1</div>
                            <div class="seat green" data-seat-number="2" onclick="bookSeat(2)">2</div>
                            <div class="seat black">S</div>
                        </div>

                        <div class="seat-row">
                            <div class="seat green" data-seat-number="3" onclick="bookSeat(3)">3</div>
                            <div class="seat green" data-seat-number="4" onclick="bookSeat(4)">4</div>
                            <div class="seat green" data-seat-number="5" onclick="bookSeat(5)">5</div>
                        </div>
                        <div class="seat-row">
                            <div class="seat green" data-seat-number="6" onclick="bookSeat(6)">6</div>
                            <div class="seat green" data-seat-number="7" onclick="bookSeat(7)">7</div>
                            <div class="seat green" data-seat-number="8" onclick="bookSeat(8)">8</div>
                        </div>
                        <div class="seat-row">
                            <div class="seat green" data-seat-number="9" onclick="bookSeat(9)">9</div>
                            <div class="seat green" data-seat-number="10" onclick="bookSeat(10)">10</div>
                            <div class="seat green" data-seat-number="11" onclick="bookSeat(11)">11</div>
                        </div>
                        <div class="seat-row">
                            <div class="seat orange">X</div>
                        </div>
                    </div>
                    <div class="notes">
                        <p>Ket :</p>
                        <p><span class="color-box green"></span> = Kursi kosong</p>
                        <p><span class="color-box red"></span> = Kursi sudah di booking</p>
                        <p><span class="color-box orange"></span> = Tempat Barang atau Paket</p>
                    </div>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Details KBT</h1>
                </div>

                <!-- Tabel untuk menampilkan data -->
                <table border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User ID</th>
                            <th>Nomor Kendaraan</th>
                            <th>Nomor Kursi</th>
                            <th>Kelas</th>
                            <th>Total Kursi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->id }}</td>
                            <td>{{ $detail->user_id }}</td>
                            <td>{{ $detail->nomor_kendaraan }}</td>
                            <td>{{ $detail->nomor_kursi }}</td>
                            <td>{{ $detail->kelas }}</td>
                            <td>{{ $detail->total_kursi }}</td>
                            <td>{{ $detail->status }}</td>
                            <td>
                                @if ($detail->status == 'pending')
                                <button class="btn-accept" onclick="updateStatus({{ $detail->id }}, 'accepted')">Diterima</button>
                                <button class="btn-reject" onclick="updateStatus({{ $detail->id }}, 'rejected')">Ditolak</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    @include ('admin.footer')
    <!-- End of Content Wrapper -->
    <script>
        function updateStatus(id, status) {
            fetch(`/admin/kendaraan/update-status/${id}/${status}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Failed to update status');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function bookSeat(seatNumber) {
            fetch(`/admin/kendaraan/book-seat/${seatNumber}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Failed to book seat');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>