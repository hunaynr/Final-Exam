@extends('masterCard')

@section('title', 'Detail Dokter')

@section('card_title', 'Detail Data Dokter')

@section('content')
@foreach($dokter as $dok)
<div class="row">
    <div class="col-4">
        <p>Nama</p>
        <p>NIP</p>
        <p>Jenis Kelamin</p>
        <p>Alamat</p>
    </div>
    <div class="col-4">
        <p>{{ $dok['nama_dok'] }}</p>
        <p>{{ $dok['nip'] }}</p>
        <p>{{ $dok['jenis_kelamin'] }}</p>
        <p>{{ $dok['alamat'] }}</p>
    </div>
    <div class="col-4"></div>
</div>
@endforeach
<a class="btn btn-success float-right" href="/puskesmas/dokter">Back</a>
@endsection