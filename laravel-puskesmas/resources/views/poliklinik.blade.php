@extends('masterTable')

@section('title', 'Poliklinik')

@section('page_name', 'Data Poliklinik')

@section('content')
<thead>
    <tr style="text-align: center;">
        <th>
            Jenis
        </th>
        <th>
            Ruang
        </th>
    </tr>
</thead>
<tbody>
    @foreach($poliklinik as $pol)
    <tr>
        <td>
            {{ $pol['jenis'] }}
        </td>
        <td>
            {{ $pol['ruang'] }}
        </td>
    </tr>
    @endforeach
</tbody>
@endsection