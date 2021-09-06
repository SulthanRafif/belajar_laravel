@extends('layout.v_template')
@section('title','Penjualan')
@section('content')
<a href="/penjualan/printpdf" target="_blank" class="btn btn-primary">Print PDF</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>No Faktur</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($penjualan as $data)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data->no_faktur}}</td>
            <td>{{$data->pelanggan}}</td>
            <td>{{$data->total}}</td>
            <td>{{$data->tanggal_buat }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection