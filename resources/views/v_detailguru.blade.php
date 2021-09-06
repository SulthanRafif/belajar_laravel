@extends('layout.v_template')
@section('title','Detail Guru')
@section('content')

<table class="table">
    <tr>
        <th width="150px">NIP</th>
        <th width="30px">:</th>
        <th>{{$guru->nip}}</th>
    </tr>
    <tr>
        <th width="150px">Nama Guru</th>
        <th width="30px">:</th>
        <th>{{$guru->nama_guru}}</th>
    </tr>
    <tr>
        <th width="150px">Foto</th>
        <th width="30px">:</th>
        <th><img src="{{url('foto_guru/'.$guru->foto_guru)}}" alt="Foto Guru" width="400px"></th>
    </tr>
    <tr>
        <th><a href="/guru" class="btn btn-success btn-sm">Kembali</a></th>
    </tr>
</table>

@endsection