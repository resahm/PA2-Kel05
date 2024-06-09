<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <link href="{{ asset('assets/css/reset_password.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        /* Label styling */
        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
            display: block;
            font-family: 'Arial', sans-serif;
        }

        .input-container {
            position: relative;
            margin-bottom: 15px;
        }

        .input-container input {
            width: calc(100% - 30px);
            /* Adjusted width */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
            font-family: 'Arial', sans-serif;
        }

        .password-toggle {
            position: absolute;
            top: 40%;
            /* Changed top value */
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #aaa;
            transition: color 0.3s;
        }

        .password-toggle:hover {
            color: #007bff;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .status-message {
            margin-bottom: 15px;
            color: #d9534f;
            /* Color for the status message */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Reset Password</h1>
        @if (session('status'))
        <div class="status-message">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ session('token') }}">
            <label for="email">Email</label>
            <div class="input-container">
                <input type="email" id="email" name="email" required>
            </div>
            <label for="password">Password Lama</label>
            <div class="input-container">
                <input type="password" id="password" name="password" required>
                <i class="password-toggle far fa-eye" onclick="togglePasswordVisibility('password')"></i>
            </div>
            <label for="password">Password Baru</label>
            <div class="input-container">
                <input type="password" id="new_password" name="new_password" required>
                <i class="password-toggle far fa-eye" onclick="togglePasswordVisibility('new_password')"></i>
            </div>
            <label for="password-confirm">Konfirmasi Password</label>
            <div class="input-container">
                <input type="password" id="password-confirm" name="password_confirmation" required>
                <i class="password-toggle far fa-eye" onclick="togglePasswordVisibility('password-confirm')"></i>
            </div>

            <button type="submit">Reset Password</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var toggleIcon = passwordInput.nextElementSibling;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>