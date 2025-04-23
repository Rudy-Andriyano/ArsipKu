@extends('layouts.app')
@section('content')
    <h2 style="text-align: center;">SNAPGRAM</h2>
    <table>
        <tr>
            <th>Pengguna</th>
            <th>Judul</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        @foreach ($photos as $photo)
            <tr>
                <td>{{$photo->user->username}}</td>
                <td>{{$photo->judulFoto}}</td>
                <td>
                    <img src="{{asset('storage/'.$photo->lokasiFile)}}" alt="{{$photo->judulFoto}}" style="width:200px; aspect-ration:1/1; object-fit:cover;">
                </td>
                <td>
                    <form action="{{route('photos.like',$photo->fotoID)}}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border:none;">
                            @if ($photo->isLikedByAuthUser())
                                <img src="{{ asset('assets/img/like (1).png')}}" style="width: 20px; align-item:center;">
                            @else
                            <img src="{{ asset('assets/img/like.png')}}" style="width: 20px;">
                            @endif
                        </button>
                    </form>
                    <a href="{{route('photos.comments', $photo->fotoID)}}" style="margin-left: 10px">Komentar</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection