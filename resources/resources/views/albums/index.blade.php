@extends('layouts.app')
@section('content')   
<div style="margin: 20px;">
    <h2>DAFTAR ALBUM</h2>
    <table style="border-collapse: collapse;">
        <tr>
            <th>Nama Album</th>
            <th>Deskripsi</th>
            <th><a href="{{route ('albums.create')}}">Tambah Album</a></th>
        </tr>
        @foreach ($albums as $album)
        <tr>
            <td>
                <a href="{{route ('albums.photos',$album->albumID)}}">{{$album->namaAlbum}}</a>
            </td>
            <td>{{$album->deskripsi}}</td>
            <td style="text-align: center;">
                <a href="{{route('albums.edit',$album->albumID)}}">Edit</a>
                <form action="{{route('albums.destroy',$album->albumID)}}"
                    method="POST" style="display:inline"
                    onsubmit="return confirm('Tindakan ini tidak bisa dibatalkan')">
                @csrf
                @method('DELETE')
                <button type="submit" 
                style="background: none; border:none:">Hapus</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection