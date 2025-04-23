<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <h2 style="text-align: center;">REGISTER</h2>
    <form action="{{ route('register')}}" method="POST">
        @csrf
        <table style="margin: 50px auto;">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="" required autofocus></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="" required ></td>
            </tr>
            <tr>
                <td>Konfirmasi Password</td>
                <td><input type="password" name="password_confirmation" id="" required ></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit">Daftar</button>
                </td>
            </tr>
        </table>
    </form>
    <p style="text-align: center;">Sudah ada akun?
        <a href="{{route('login')}}">Login disini</a>
    </p>
</body>
</html>