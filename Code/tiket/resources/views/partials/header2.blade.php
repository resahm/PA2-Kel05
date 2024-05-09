<header class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                    <a class="navbar-brand" href="#"><img src="{{ url('storage/images/kbt.jpeg') }}" alt="" style="height: 70px;"></a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100" href="{{ route('users.tiket') }}" id="home-tab" role="tab" aria-controls="Pesan sekarang" aria-selected="true">PESAN SEKARANG</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100" href="{{ route('guest.pemesanan') }}" id="profile-tab" role="tab" aria-controls="cara pemesanan dan pembayaran" aria-selected="false">CARA PEMESANAN &amp; PEMBAYARAN</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100" href="{{ route('guest.login') }}" id="contact-tab" role="tab" aria-controls="cek pesanan" aria-selected="false">CEK PESANAN</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100" href="{{ route('guest.login') }}" id="contact-tab" role="tab" aria-controls="login member" aria-selected="false">LOGIN MEMBER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-8" href="#"><img src="{{ url('storage/images/barang.jpg') }}" alt="" style="height: 60px;">KIRIM BARANG</a>
                </li>
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li>
            </ul>
        </div>
    </div>
</header>