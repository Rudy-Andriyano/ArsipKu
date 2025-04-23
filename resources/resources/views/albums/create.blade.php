@extends('layouts.app')
@section('content')
<div style="margin: 20px">
    <h2>Buat Album baru</h2>
    <form action="{{ route('albums.store')}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>
                    <label for="namaAlbum">Nama Album</label>
                </td>
                <td>
                    <input type="text" name="namaAlbum" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="namaAlbum">Deskripsi Album</label>
                </td>
                <td>
                    <textarea name="deskripsi" required maxlength="150"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <button type="submit">Tambah Album</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection