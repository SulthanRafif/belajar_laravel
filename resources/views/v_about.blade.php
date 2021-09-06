<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>

<body>
    <h1>Ini Halaman About</h1>

    <h2>Nama : <?= $nama; ?></h2>
    Alamat : <?= $alamat; ?>

    <h3>Nama : {{$nama}}</h3>
    Alamat : {!!$alamat!!}

</body>

</html> -->

@extends('layout.v_template')
@section('title', 'About')
@section('content')
<h1>Ini Halaman About</h1>
@endsection