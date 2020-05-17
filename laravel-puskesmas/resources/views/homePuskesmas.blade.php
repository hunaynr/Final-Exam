@extends('masterTable')

@section('title', 'Puskesmas Home')

@section('page_name', 'Puskesmas Client Laravel')

@section('content')
<thead>
    <tr style="text-align: center;">
        <th>
            No Absen
        </th>
        <th>
            Nama
        </th>
        <th>
            NIM
        </th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>
            {{ $noAbsen }}
        </td>
        <td>
            {{ $nama }}
        </td>
        <td>
            {{ $nim }}
        </td>
    </tr>
</tbody>
@endsection