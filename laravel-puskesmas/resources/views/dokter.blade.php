@extends('masterTable')

@section('title', 'Dokter')

@section('page_name', 'Data Dokter')

@section('content')
<thead>
    <tr style="text-align: center;">
        <th>
            No
        </th>
        <th>
            Nama
        </th>
        <th>
            Action
        </th>
    </tr>
</thead>
<tbody>
    @foreach($dokter as $dok)
    <tr>
        <td>
            {{ $dok['id_dok'] }}
        </td>
        <td>
            {{ $dok['nama_dok'] }}
        </td>
        <td>
            <a class="btn btn-primary" href="/puskesmas/dokter/detail/{{ $dok['id_dok'] }}">
                Detail</a>
        </td>
    </tr>
    @endforeach
</tbody>
@endsection