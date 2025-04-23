<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    <h2 style="text-align: center;">Login</h2>
    <form action="{{ route('postLogin')}}" method="POST">
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
                <td colspan="2" style="text-align: center;">
                    <p>Belum ada akun?
                        <a href="{{route('register.form')}}">Daftar disini</a>
                    </p>
                    <button type="submit">Login</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>