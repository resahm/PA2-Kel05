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
        <form id="registrationForm" action="{{route ('registrasi')}}" method="post" onsubmit="return validateForm()">
            @csrf
            <h2 class="mb-3" style="text-align: center;">Form Registrasi</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="nama">Nama Lengkap:</label>
                        <input type="text" id="nama" name="name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="noHp">No. HP:</label>
                        <input type="tel" id="noHp" name="phone_number" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="jenisKelamin">Jenis Kelamin:</label>
                        <select id="jenisKelamin" name="gender" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="nomorIdentitas">Nomor Identitas:</label>
                        <input type="text" id="nomorIdentitas" name="identity_number" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-field">
                        <label for="tanggalLahir">Tanggal Lahir:</label>
                        <input type="date" id="tanggalLahir" name="birthdate" required>
                    </div>
                </div>
            </div>
            <label for="password">Password:</label>
            <div class="input-field">
                <input type="password" id="password" name="password" required>
                <i class="password-toggle far fa-eye" onclick="togglePasswordVisibility('password')"></i>
            </div>

            <label for="confirmPassword">Konfirmasi Password:</label>
            <div class="input-field">
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <i class="password-toggle far fa-eye" onclick="togglePasswordVisibility('confirmPassword')"></i>
            </div>
            <input type="submit" value="Registrasi" class="btn btn-primary">
        </form>
    </div>

    <!-- Link to Bootstrap JavaScript from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                document.getElementById('passwordError').innerText = 'Password dan Konfirmasi Password harus sama.';
                return false;
            }

            return true;
        }

        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                document.getElementById(inputId).nextElementSibling.classList.remove('fa-eye');
                document.getElementById(inputId).nextElementSibling.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                document.getElementById(inputId).nextElementSibling.classList.remove('fa-eye-slash');
                document.getElementById(inputId).nextElementSibling.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>