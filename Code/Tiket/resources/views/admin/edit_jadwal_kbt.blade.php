<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Jadwal Keberangkatan KBT</title>
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

        form {
            margin-top: 20px;
        }

        label,
        select,
        input {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Jadwal Keberangkatan KBT</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Tiket</li>
                    <li class="breadcrumb-item active">Tambah Jadwal Keberangkatan KBT</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="container">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Edit Jadwal KBT</h1>
                </div>
                <!-- Form untuk menambah data detail tiket -->
                <form action="{{ route('admin.jadwal_kbt.update', $jadwalKbt->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                    <input type="date" id="tanggal_keberangkatan" name="tanggal_keberangkatan" required>
                    <br>
                    <label for="waktu_keberangkatan">Waktu Keberangkatan</label>
                    <input type="time" id="waktu_keberangkatan" name="waktu_keberangkatan" required>
                    <br>
                    <!-- Set kapasitas kursi secara otomatis -->
                    <input type="hidden" id="kapasitas_kursi" name="kapasitas_kursi" value="11">
                    <br>
                    <button type="submit">Tambah Jadwal KBT</button>
                </form>
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