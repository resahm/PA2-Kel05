<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<header id="header" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                    <a class="navbar-brand" href="#"><img src="{{ url('assets/img/kbt.jpeg') }}" alt="" style="height: 100px; margin-right:30px; "></a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('users/tiket*') ? 'active' : '' }}" href="{{ route('users.tiket') }}" id="home-tab" role="tab" aria-controls="Pesan sekarang" aria-selected="true">PESAN SEKARANG</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('users/pemesanan*','users/pembayaran') ? 'active' : '' }}" href="{{ route('users.pemesanan') }}" id="profile-tab" role="tab" aria-controls="cara pemesanan dan pembayaran" aria-selected="false">CARA PEMESANAN &amp; PEMBAYARAN</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('guest/login*') ? 'active' : '' }}" href="{{ route('guest.login') }}" id="contact-tab" role="tab" aria-controls="cek pesanan" aria-selected="false">CEK PESANAN</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 {{ request()->is('users/history*') ? 'active' : '' }}" href="{{ route('users.history') }}" id="contact-tab" role="tab" aria-controls="history" aria-selected="false">HISTORY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-8 {{ request()->is('users/barang*') ? 'active' : '' }}" href="{{ route('users.barang') }}"><img src="{{ url('assets/img/barang.jpg') }}" alt="" style="height: 60px;">KIRIM BARANG</a>
                </li>
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0 {{ request()->is('users/user-profile*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/profile_users.png')}}" alt="Profile" class="rounded-circle profile-img">
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center {{ request()->is('users/user-profile*') ? 'active' : '' }}" href="{{ route('users.user-profile') }}">
                                <i class="bi bi-person"></i>
                                <span>&#x2003;My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center {{ request()->is('users/user-profile*') ? 'active' : '' }}" href="{{ route('users.user-profile') }}">
                                <i class="bi bi-gear"></i>
                                <span>&#x2003;Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('guest.login') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>&#x2003;Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li>
            </ul>
        </div>
    </div>
</header>
