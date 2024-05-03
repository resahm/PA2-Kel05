<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket</title>
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
</head>

<body>

    @include('partials.header2')
    <!-- ======= Hero Section ======= -->
    <section class="hero-section" id="hero">

        <div class="wave">

            <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                        <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
                    </g>
                </g>
            </svg>

        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 hero-text-image">
                    <div class="row">
                        <div class="col-lg-8 text-center text-lg-start">
                            <h1 data-aos="fade-right">Promote Your App with SoftLand</h1>
                            <p class="mb-5" data-aos="fade-right" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit.</p>
                            <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="#" class="btn btn-outline-white">Get started</a></p>
                        </div>
                        <div class="col-lg-4 iphone-wrap">
                            <img src="assets/img/phone_1.png" alt="Image" class="phone-1" data-aos="fade-right">
                            <img src="assets/img/phone_2.png" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Home Section ======= -->
        <section class="section">
            <div class="container">

                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-5" data-aos="fade-up">
                        <h2 class="section-heading">Save your time to using SoftLand</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="">
                        <div class="feature-1 text-center">
                            <div class="wrap-icon icon-1">
                                <i class="bi bi-people"></i>
                            </div>
                            <h3 class="mb-3">Explore Your Team</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-1 text-center">
                            <div class="wrap-icon icon-1">
                                <i class="bi bi-brightness-high"></i>
                            </div>
                            <h3 class="mb-3">Digital Whiteboard</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-1 text-center">
                            <div class="wrap-icon icon-1">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <h3 class="mb-3">Design To Development</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="section">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="col-md-4">
                            <div class="post-entry">
                                <a href="blog-single.html" class="d-block mb-4">
                                    <img src="assets/img/img_1.jpg" alt="Image" class="img-fluid">
                                </a>
                                <div class="post-text">
                                    <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>
                                    <h3><a href="#">Chrome now alerts you when someone steals your password</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                                    <p><a href="#" class="readmore">Read more</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="col-md-4">
                            <div class="post-entry">
                                <a href="blog-single.html" class="d-block mb-4">
                                    <img src="assets/img/img_1.jpg" alt="Image" class="img-fluid">
                                </a>
                                <div class="post-text">
                                    <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>
                                    <h3><a href="#">Chrome now alerts you when someone steals your password</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                                    <p><a href="#" class="readmore">Read more</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="col-md-4">
                            <div class="post-entry">
                                <a href="blog-single.html" class="d-block mb-4">
                                    <img src="assets/img/img_1.jpg" alt="Image" class="img-fluid">
                                </a>
                                <div class="post-text">
                                    <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>
                                    <h3><a href="#">Chrome now alerts you when someone steals your password</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                                    <p><a href="#" class="readmore">Read more</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="col-md-4">
                            <div class="post-entry">
                                <a href="blog-single.html" class="d-block mb-4">
                                    <img src="assets/img/img_1.jpg" alt="Image" class="img-fluid">
                                </a>
                                <div class="post-text">
                                    <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>
                                    <h3><a href="#">Chrome now alerts you when someone steals your password</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                                    <p><a href="#" class="readmore">Read more</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="col-md-4">
                            <div class="post-entry">
                                <a href="blog-single.html" class="d-block mb-4">
                                    <img src="assets/img/img_1.jpg" alt="Image" class="img-fluid">
                                </a>
                                <div class="post-text">
                                    <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>
                                    <h3><a href="#">Chrome now alerts you when someone steals your password</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                                    <p><a href="#" class="readmore">Read more</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="col-md-4">
                            <div class="post-entry">
                                <a href="blog-single.html" class="d-block mb-4">
                                    <img src="assets/img/img_1.jpg" alt="Image" class="img-fluid">
                                </a>
                                <div class="post-text">
                                    <span class="post-meta">December 13, 2019 &bullet; By <a href="#">Admin</a></span>
                                    <h3><a href="#">Chrome now alerts you when someone steals your password</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, optio.</p>
                                    <p><a href="#" class="readmore">Read more</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="content-container">
        <div class="content">
            <section class="page-single mt-100 mb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="ticket-info">
                                <form>
                                    <label for="tanggal_pemesanan">Tanggal Pemesanan</label><br>
                                    <input type="date" id="tanggal_pemesanan" name="tanggal_pemesanan"><br>
                                    <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label><br>
                                    <input type="date" id="tanggal_keberangkatan" name="tanggal_keberangkatan"><br>
                                    <label for="asal_keberangkatan">Asal Keberangkatan</label><br>
                                    <input type="text" id="asal_keberangkatan" name="asal_keberangkatan"><br>
                                    <label for="tujuan">Tujuan:</label><br>
                                    <input type="text" id="tujuan" name="tujuan"><br>
                                    <label for="jumlah_penumpang">Jumlah Penumpang</label><br>
                                    <input type="number" id="jumlah_penumpang" name="jumlah_penumpang"><br><br>
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