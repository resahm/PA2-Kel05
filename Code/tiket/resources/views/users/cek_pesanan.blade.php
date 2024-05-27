<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cek Pesanan Tiket</title>
    <link rel="icon" href="{{ asset('assets/img/kbt.png') }}" type="image/png">
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

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/cek_pesanan.css') }}" rel="stylesheet">

    <style>
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            padding: 0 10px;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 2rem;
            color: gray;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating input[type="radio"]:checked~label {
            color: orange;
        }

        .star-rating label:hover,
        .star-rating label:hover~label {
            color: orange;
        }
    </style>

</head>

<body>

    @include('partials.header2')

    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cek Pesanan</h5>

                            <table>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Kelas</th>
                                        <th>Subtotal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ticketApprovals as $ticketApproval)
                                    <tr>
                                        <td>{{ $ticketApproval->name }}</td>
                                        <td>{{ $ticketApproval->email }}</td>
                                        <td>{{ $ticketApproval->kelas }}</td>
                                        <td>{{ $ticketApproval->subtotal }}</td>
                                        <td>{{ $ticketApproval->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card" style="height:auto">
                        <div class="card-body">
                            <!-- Trigger Button for Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                Buat Ulasan
                            </button>


                            <!-- Display existing reviews -->
                            @foreach($ulasans as $ulasan)
                            <div class="card review-card mt-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <h5 class="card-title mb-1">{{ $ulasan->name }}</h5>

                                        <div class="ms-3">
                                            <div class="star-rating">
                                                @for($i = 1; $i <= 5; $i++) <span class="fa fa-star{{ $i <= $ulasan->rating ? ' checked' : '' }}"></span>
                                                    @endfor
                                            </div>
                                        </div>
                                        <p class="card-text">{{ $ulasan->isi_ulasan }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    @include('partials.footer2')

    <!-- Modal for Review -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel">Buat Ulasan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="review-form" action="{{ route('users.store_ulasan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <div class="star-rating">
                                <input type="radio" id="star5" name="rating" value="5" required /><label for="star5" title="5 stars">&#9733;</label>
                                <input type="radio" id="star4" name="rating" value="4" required /><label for="star4" title="4 stars">&#9733;</label>
                                <input type="radio" id="star3" name="rating" value="3" required /><label for="star3" title="3 stars">&#9733;</label>
                                <input type="radio" id="star2" name="rating" value="2" required /><label for="star2" title="2 stars">&#9733;</label>
                                <input type="radio" id="star1" name="rating" value="1" required /><label for="star1" title="1 star">&#9733;</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="review_text" class="form-label">Isi Ulasan</label>
                            <textarea class="form-control" id="review_text" name="review_text" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star-rating label');
            stars.forEach(star => {
                star.addEventListener('mouseover', function() {
                    const value = this.previousElementSibling.value;
                    stars.forEach(s => {
                        if (s.previousElementSibling.value <= value) {
                            s.style.color = 'orange';
                        } else {
                            s.style.color = 'gray';
                        }
                    });
                });
                star.addEventListener('mouseout', function() {
                    const value = document.querySelector('.star-rating input:checked')?.value || 0;
                    stars.forEach(s => {
                        if (s.previousElementSibling.value <= value) {
                            s.style.color = 'orange';
                        } else {
                            s.style.color = 'gray';
                        }
                    });
                });
                star.addEventListener('click', function() {
                    const value = this.previousElementSibling.value;
                    stars.forEach(s => {
                        if (s.previousElementSibling.value <= value) {
                            s.style.color = 'orange';
                        } else {
                            s.style.color = 'gray';
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>