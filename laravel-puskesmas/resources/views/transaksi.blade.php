@extends('masterTable')

@section('title', 'Traansaksi')

@section('page_name', 'Data Transaksi')

@section('content')
<thead>
    <tr style="text-align: center;">
        <th>
            Nama Pasien
        </th>
        <th>
            Nama Poliklinik
        </th>
        <th>
            Nama Dokter
        </th>
        <th>
            Tanggal
        </th>
        <th>
            Action
        </th>
    </tr>
</thead>
<tbody>
    @foreach($transaksi as $trans)
    <tr>
        <td>
            {{ $trans['nama_pas'] }}
        </td>
        <td>
            {{ $trans['jenis'] }}
        </td>
        <td>
            {{ $trans['nama_dok'] }}
        </td>
        <td>
            {{ $trans['tanggal_pukul'] }}
        </td>
        <td>
            <a class="btn btn-danger" href="/puskesmas/transaksi/delete/{{ $trans['id_trans'] }}">Delete</a>
            <a class="btn btn-primary" href="/puskesmas/transaksi/edit/{{ $trans['id_trans'] }}">Edit</a>
        </td>
    </tr>
    @endforeach
</tbody>
@endsection
@section('extra')
<a class="btn btn-success" href="/puskesmas/transaksi/add">Add</a>
@endsection