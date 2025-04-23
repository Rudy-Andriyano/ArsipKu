@extends('layouts.app')
@section('content')
    <h2>Profile saya</h2>
    <form action="{{route('profile.update')}}" method="POST">
        @csrf
        @method('PUT')
        <table style="border: none; text-align:left;">
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" value="{{$user->username}}"></td>
            </tr>
            <tr>
                <td><label for="namaLengkap">nama Lengkap</label></td>
                <td><input type="text" name="namaLengkap" value="{{$user->namaLengkap}}"></td>
            </tr>
            <tr>
                <td><label for="email">email</label></td>
                <td><input type="text" name="email" value="{{$user->email}}"></td>
            </tr>
            <tr>
                <td><label for="alamat">alamat</label></td>
                <td><textarea name="alamat"> {{$user->alamat}}</textarea></td>
            </tr>
            <tr>
                <td><label for="password">password</label></td>
                <td><input type="password" name="password" ></td>
            </tr>
            <tr>
                <td><label for="password_confirmation">Konfirmasi password</label></td>
                <td><input type="password" name="password_confirmation" ></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">simpan</button></td>
            </tr>
        </table>
    </form>
    <table>
        <tr>
            <td>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </td>
        </tr>
    </table>
@endsection