<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Ini Halaman Home</h1>
    <h3>Selamat Datang Di Web Sulthan Rafif</h3>
    <h3>Belajar Laravel</h3>
</body>

</html> -->

@extends('layout.v_template')
@section('title')
Home
@endsection
@section('content')
<h1>Ini Halaman Home Web Sekolah</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc laoreet a ligula nec lacinia. Vivamus viverra justo nisi, ac dapibus est pulvinar vitae. Aliquam eget odio varius, sollicitudin purus vitae, dignissim nisi. Integer quis sem sit amet ex fermentum efficitur ac a massa. Praesent at bibendum elit, id tempus risus. Morbi quis nunc turpis. Nulla lectus magna, facilisis sit amet enim et, finibus venenatis augue. Fusce porttitor ullamcorper lorem, eu ultricies ante fringilla vitae. Nulla tincidunt, magna vel tincidunt pulvinar, arcu nunc facilisis felis, in pharetra tortor tortor vel odio. Donec aliquam pretium metus eget aliquam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras maximus facilisis nibh, et faucibus est lobortis non. Donec pulvinar in metus ac blandit. Nullam sit amet convallis risus. Sed sagittis ullamcorper leo, non ultricies nulla pellentesque eget. </p>
<br>
<img src="{{asset('gambar/van_halen.jpg')}}" alt="Gambar Van Halen" width="200px">
<br>
<br>
<img src="{{asset('gambar/gta.jpg')}}" alt="Gambar GTA" width="200px">
<br>
<br>
<img src="{{asset('gambar/iron_throne.jpg')}}" alt="Gambar Iron Throne" width="200px">
@endsection