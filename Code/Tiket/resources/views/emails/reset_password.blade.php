<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
</head>

<body>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
            <td align="center" bgcolor="#1a82e2" style="padding: 40px 0 30px 0;">
                <h1 style="color: #ffffff;">Permintaan Reset Password</h1>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                <p>Halo, {{ $user->name }}!</p>
                <p>Kami menerima permintaan untuk mereset password akun website KBT Anda.</p>
                <p>Silakan klik link di bawah ini untuk melakukan reset password:</p>
                <p><a href="{{ route('guest.ganti_password') }}" style="display: inline-block; background-color: #1a82e2; color: #ffffff; padding: 10px 20px; text-decoration: none;">Reset Password</a></p>
                <p>Jika Anda tidak melakukan permintaan ini, Anda bisa mengabaikan email ini.</p>
                <p>Terima kasih,<br> ADMIN KBT</p>
            </td>
        </tr>
    </table>
</body>

</html>