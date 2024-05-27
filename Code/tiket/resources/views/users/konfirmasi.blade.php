<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Bukti Pembayaran</title>
    <link rel="icon" href="{{ asset('assets/img/kbt.png') }}" type="image/png">

    <!-- Link to Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/tiket.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        /* General body styling */
        body {
            font-family: 'Open Sans', 'Nunito', 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        /* Override for .mt-5 */
        .mt-5 {
            margin-top: 200px !important;
            margin-bottom: 450px !important;
            /* Bootstrap 5 mt-5 utility class */
        }

        /* Card styling */
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border: none;
        }

        /* Card header styling */
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: 600;
        }

        /* Form label styling */
        .form-label {
            font-weight: 500;
        }

        /* Preview images styling */
        .preview {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border: 1px solid #ced4da;
            padding: 5px;
        }

        b {
            color: red;
        }

        .button-container {
            display: flex;
            gap: 2rem;
            /* Atur jarak antara tombol-tombol */
        }

        .button-container form {
            margin: 0;
        }
    </style>
</head>

<body>

    @include('partials.header2')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Konfirmasi Bukti Pembayaran</div>

                    <div class="card-body">
                        <p>Terima kasih telah melakukan pembayaran. Kami telah menerima bukti pembayaran Anda.</p>
                        <b>Tunggu Konfirmasi dari Admin KBT !</b>
                    </div>

                    <div class="button-container">
                        <form action="{{ asset('assets/tcpdf/tcpdf/cetak-tiket.php') }}" method="get">
                            <input type="hidden" name="id" value="{{ session('latest_ticket_id') }}">
                            <button type="submit" class="btn btn-primary">Cetak Tiket <br>PDF</button>
                        </form>
                        <form action="{{ route('export.excel') }}" method="get">
                            <input type="hidden" name="id" value="{{ session('latest_ticket_id') }}">
                            <button type="submit" class="btn btn-primary">Cetak Tiket <br>EXCEL</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('partials.footer2')

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Link to RateYo! JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

</body>

</html>