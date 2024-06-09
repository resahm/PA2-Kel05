<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel-Payments Tiket KBT</title>
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
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Detail Payment Pelanggan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Payments</li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="container">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Details Payment KBT</h1>
                </div>

                <!-- Tabel untuk menampilkan data -->

                <table border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>ID Ticket</th>
                            <th>Jumlah Pembayaran</th>
                            <th>Metode Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Bukti Pembayaran</th>
                            <th>Foto KTP</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $key => $payment)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $payment->name }}</td>
                            <td>{{ $payment->email }}</td>
                            <td>{{ $payment->ticket_id }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->payment_method }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>
                                @if($payment->payment_proof)
                                <img src="{{ asset($payment->payment_proof) }}" alt="Bukti Pembayaran" style="max-width: 100px; max-height: 100px;">
                                @else
                                Tidak ada gambar
                                @endif
                            </td>
                            <td>
                                @if($payment->ktp_image)
                                <img src="{{ asset($payment->ktp_image) }}" alt="Foto KTP" style="max-width: 100px; max-height: 100px;">
                                @else
                                Tidak ada gambar
                                @endif
                            </td>
                            <td>{{ $payment->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    @include ('admin.footer')
    <!-- End of Content Wrapper -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js')}}"></script>
</body>

</html>