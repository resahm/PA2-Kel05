<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket</title>
    <link rel="icon" href="{{ asset('assets/img/kbt.jpeg') }}" type="image/png">
    <!-- Link to Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

</head>

<body>

    @include('partials.header2')
    <div class="content-container">
        <div class="content">
            <section class="page-single mt-100 mb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="ticket-info">
                                <form>
                                    <label for="tanggal_pemesanan">Tanggal Pemesanan:</label><br>
                                    <input type="date" id="tanggal_pemesanan" name="tanggal_pemesanan"><br>
                                    <label for="tanggal_keberangkatan">Tanggal Keberangkatan:</label><br>
                                    <input type="date" id="tanggal_keberangkatan" name="tanggal_keberangkatan"><br>
                                    <label for="waktu_keberangkatan">Waktu Keberangkatan:</label><br>
                                    <input type="time" id="waktu_keberangkatan" name="waktu_keberangkatan"><br>
                                    <label for="asal_keberangkatan">Asal Keberangkatan:</label><br>
                                    <input type="text" id="asal_keberangkatan" name="asal_keberangkatan"><br>
                                    <label for="tujuan">Tujuan:</label><br>
                                    <input type="text" id="tujuan" name="tujuan"><br><br>
                                    <input type="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    @include('partials.footer2')

    <!-- Link to Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>