<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Users - Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link rel="icon" href="{{ asset('assets/img/kbt.png') }}" type="image/png">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/tiket.css') }}">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background-color: #f8f9fc;
    }
    .main {
      padding: 20px;
    }
    .content-container {
      max-width: 1000px;
      margin: auto;
      padding: 20px;
    }
    .profile-card {
      background: linear-gradient(135deg, #6f42c1 0%, #4e73df 100%);
      color: white;
      text-align: center;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .profile-card img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin-bottom: 15px;
      border: 3px solid white;
    }
    .profile-card h5 {
      margin-bottom: 10px;
      font-size: 1.5em;
    }
    .nav-tabs .nav-link {
      border: none;
      font-weight: bold;
      color: #4e73df;
      padding: 15px;
      transition: background 0.3s, color 0.3s;
    }
    .nav-tabs .nav-link.active,
    .nav-tabs .nav-link:hover,
    .nav-tabs .nav-link:focus {
      background: #4e73df;
      color: white;
      border-radius: 5px;
    }
    .nav-tabs .nav-link.active {
      box-shadow: inset 0 -2px 0 white;
    }
    .card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }
    .card-body {
      padding: 20px;
    }
    .profile-overview .row {
      margin-bottom: 15px;
    }
    .profile-overview .label {
      font-weight: bold;
      color: #6c757d;
    }
    .profile-edit .form-control,
    .profile-edit .form-select {
      border: 1px solid #ced4da;
      border-radius: 5px;
      padding: 10px;
    }
    .profile-edit .btn-primary {
      background: #4e73df;
      border: none;
      transition: background 0.3s;
    }
    .profile-edit .btn-primary:hover {
      background: #2e59d9;
    }
    .back-to-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: #4e73df;
      color: white;
      padding: 10px;
      border-radius: 50%;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: background 0.3s;
    }
    .back-to-top:hover {
      background: #2e59d9;
    }
  </style>
</head>

<body>
  @include('partials.header2')
  <main id="main" class="main">
    <div class="content-container">
      <div class="content">
        <section class="section profile">
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div class="card profile-card mt-1">
                <div class="card-body profile-card pt-2 d-flex flex-column align-items-center">
                  <img src="{{ asset('assets/img/profile_users.png')}}" alt="Profile" class="rounded-circle">
                  <h5>{{ Auth::user()->name }}</h5>
                </div>
              </div>
            </div>
            <div class="col-xl-10 mt-3">
              <div class="card">
                <div class="card-body pt-4">
                  <ul class="nav nav-tabs nav-tabs-bordered justify-content-center">
                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                    </li>
                  </ul>
                  <div class="tab-content pt-3">
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                      <h5 class="card-title">Profile Details</h5>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Full Name</div>
                        <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Phone Number</div>
                        <div class="col-lg-9 col-md-8">{{ Auth::user()->phone_number }}</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Gender</div>
                        <div class="col-lg-9 col-md-8">{{ Auth::user()->gender }}</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Identity Number</div>
                        <div class="col-lg-9 col-md-8">{{ Auth::user()->identity_number }}</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Birthdate</div>
                        <div class="col-lg-9 col-md-8">{{ Auth::user()->birthdate }}</div>
                      </div>
                    </div>
                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                      <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                          <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="name" type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="phone_number" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="phone_number" type="text" class="form-control" id="phone_number" value="{{ Auth::user()->phone_number }}">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                          <div class="col-md-8 col-lg-9">
                            <select name="gender" class="form-select" id="gender">
                              <option value="laki-laki" {{ Auth::user()->gender == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                              <option value="perempuan" {{ Auth::user()->gender == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="identity_number" class="col-md-4 col-lg-3 col-form-label">Identity Number</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="identity_number" type="text" class="form-control" id="identity_number" value="{{ Auth::user()->identity_number }}">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="birthdate" class="col-md-4 col-lg-3 col-form-label">Birthdate</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="birthdate" type="date" class="form-control" id="birthdate" value="{{ Auth::user()->birthdate }}">
                          </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
  @include('partials.footer2')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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
