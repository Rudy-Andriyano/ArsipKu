<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SNAPGRAM</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}">
</head>
<body>
    <ul>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('albums.index')}}">Albums</a></li>
        <li><a href="{{route('photos.create')}}">Upload</a></li>
        <li><a href="{{route('profile.index')}}">Profile</a></li>
    </ul>
    @yield('content')
</body>
</html>