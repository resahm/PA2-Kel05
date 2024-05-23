<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="icon" href="{{ asset('assets/img/kbt.png') }}" type="image/png">
    <!-- Link to Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/registrasi.css') }}">
</head>

<body>
    <div class="container2 mt-5">
        <form id="registrationForm" action="{{ route('registrasi') }}" method="post" onsubmit="return validateForm()">
            @csrf
            <h2 class="mb-3">Form Registrasi</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="nama">Nama Lengkap:</label>
                        <input type="text" id="nama" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @else
                        <div class="form-text">Nama diawali dengan huruf besar.</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="noHp">No. HP:</label>
                        <input type="tel" id="noHp" name="phone_number" value="{{ old('phone_number') }}" required>
                        @error('phone_number')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @else
                        <div class="form-text">Nomor HP terdiri dari 12 angka.</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="jenisKelamin">Jenis Kelamin:</label>
                        <select id="jenisKelamin" name="gender" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="laki-laki" {{ old('gender') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{ old('gender') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @else
                        <div class="form-text">Pilih salah satu jenis kelamin.</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="nomorIdentitas">Nomor Identitas:</label>
                        <input type="text" id="nomorIdentitas" name="identity_number" value="{{ old('identity_number') }}" required>
                        @error('identity_number')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @else
                        <div class="form-text">Nomor Identitas terdiri dari 16 angka.</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @else
                        <div class="form-text">Format email harus valid.</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="tanggalLahir">Tanggal Lahir:</label>
                        <input type="date" id="tanggalLahir" name="birthdate" value="{{ old('birthdate') }}" required>
                        @error('birthdate')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @else
                        <div class="form-text">Format tanggal lahir harus valid.</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="input-field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <i class="password-toggle far fa-eye" onclick="togglePasswordVisibility('password')"></i>
                @error('password')
                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                @else
                <div class="form-text">Password terdiri dari 8 perpaduan kata dengan huruf besar, huruf kecil, dan angka.</div>
                @enderror
            </div>
            <div class="input-field">
                <label for="confirmPassword">Konfirmasi Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <i class="password-toggle far fa-eye" onclick="togglePasswordVisibility('confirmPassword')"></i>
                <div id="confirmPasswordError" class="invalid-feedback"></div>
            </div>
            <input type="submit" value="Registrasi" class="mt-3">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/form.js') }}"></script>
</body>

</html>
