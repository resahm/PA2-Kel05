<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Bukti Pembayaran</title>
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
            margin-bottom: 20px !important;
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
    </style>
</head>

<body>

    @include('partials.header2')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Isi Bukti Pembayaran</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store_payment_tiket') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name <b style="color:red;">*Masukkan sesuai nama di KTP</b></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <p class="form-control-plaintext">{{ $email }}</p>
                                <input type="hidden" name="email" value="{{ $email }}">
                            </div>

                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <p class="form-control-plaintext">{{ $kelas }}</p>
                                <input type="hidden" name="kelas" value="{{ $kelas }}">
                            </div>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Jumlah Pembayaran</label>
                                <p class="form-control-plaintext">{{ $subtotal }}</p>
                                <input type="hidden" name="amount" value="{{ $subtotal }}">
                            </div>

                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                                <p class="form-control-plaintext">{{ $payment_method }}</p>
                                <input type="hidden" name="payment_method" value="{{ $payment_method }}">
                            </div>

                            <div class="mb-3">
                                <label for="payment_date" class="form-label">Tanggal Pembayaran</label>
                                <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                                @error('payment_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <script>
                                // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
                                const today = new Date().toISOString().split('T')[0];
                                // Mengatur nilai minimum pada input tanggal
                                document.getElementById('payment_date').setAttribute('min', today);
                            </script>

                            <div class="mb-3">
                                <label for="payment_proof" class="form-label">Bukti Pembayaran</label>
                                <input type="file" class="form-control" id="payment_proof" name="payment_proof" accept="image/*" required>
                                <img id="payment_proof_preview" class="preview" src="#" alt="Payment Proof Preview" style="display:none;">
                            </div>

                            <div class="mb-3">
                                <label for="ktp_image" class="form-label">Foto KTP</label>
                                <input type="file" class="form-control" id="ktp_image" name="ktp_image" accept="image/*" required>
                                <img id="ktp_image_preview" class="preview" src="#" alt="KTP Image Preview" style="display:none;">
                            </div>

                            <script>
                                function previewImage(inputId, previewId) {
                                    const fileInput = document.getElementById(inputId);
                                    const previewImage = document.getElementById(previewId);

                                    if (fileInput.files && fileInput.files[0]) {
                                        const reader = new FileReader();

                                        reader.onload = function(e) {
                                            previewImage.src = e.target.result;
                                            previewImage.style.display = 'block';
                                        }

                                        reader.readAsDataURL(fileInput.files[0]);
                                    } else {
                                        previewImage.src = '#';
                                        previewImage.style.display = 'none';
                                    }
                                }
                            </script>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer2')

    <!-- Include Bootstrap JavaScript from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>