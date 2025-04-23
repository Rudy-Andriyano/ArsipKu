@extends('layouts.app')

@section('content')
<div style="text-align: center; padding:20px;">
    <h2>Komentar Untuk {{$photo->user->username}}</h2>
    <div>
        <img style="width: 200px; height:auto; aspect-ratio:1/1; object-fit:cover;" 
        src="{{asset('storage/'.$photo->lokasiFile)}}" alt="{{$photo->judulFoto}}">
        <div style="margin-top: 10px; text-align:left;">
            <strong>{{$photo->user->username}}</strong>;{{$photo->deskripsiFoto}}
        </div>
    </div>
    <h3>Komentar</h3>
    <div style="margin-bottom: 20px">
        @foreach ($photo->comments as $comment)
            <div style="margin-bottom: 10px; text-align:left;">
                <strong>{{$comment->user->username}}</strong>: {{$comment->isiKomentar}}
            </div>
        @endforeach
    </div>
    <hr>
    <form action="{{route('photos.comment.store', $photo->fotoID)}}" method="POST">
        @csrf
        <div style="margin-bottom: 10px">
            <textarea name="isiKomentar" id="" cols="30" rows="10" placeholder="Tulis komentar..." required
            maxlength="200" style="width: 100%; height:60px"></textarea>
        </div>
        <button type="submit" style="padding: 10px 20px; background-color: #007bff; 
        color:white; border:none; cursor:pointer;">Kirim</button>
    </form>
</div>
@endsection