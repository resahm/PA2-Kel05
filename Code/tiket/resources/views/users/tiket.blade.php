<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket</title>
    <link rel="icon" href="{{ asset('storage/images/title.jpeg') }}" type="image/png">
    <!-- Link to Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/tiket.css') }}">
</head>

<body>

    @include('partials.header2')
    <section class="page-single mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="ticket-info">
                        <h2>Informasi Tiket</h2>
                        <p><strong>Jumlah Penumpang:</strong> 1</p>
                        <p><strong>Tanggal Pemesanan:</strong> 1 Januari 2024</p>
                        <p><strong>Tanggal Keberangkatan:</strong> 2 Januari 2024</p>
                        <p><strong>Nama Pemesan:</strong> John Doe</p>
                        <p><strong>Email:</strong> johndoe@example.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer2')

    <!-- Link to Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>