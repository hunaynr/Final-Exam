@extends('masterCard')

@section('title', 'Add Transaksi')

@section('card_title', 'Add Data Transaksi')

@section('content')
<form action="/puskesmas/save" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nama_pas">Nama Pasien</label>
        <select class="form-control" id="id_pas" name="id_pas">
            <?php
            $i = count($data['pas']['data']);

            for ($a = 0; $a < $i; $a++) { ?>
                <option value="<?= $data['pas']['data'][$a]['id_pas']; ?>"><?= $data['pas']['data'][$a]['nama_pas']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jenis">Nama Poliklinik</label>
        <select class="form-control" id="id_pol" name="id_pol">
            <?php
            $i = count($data['pol']['data']);

            for ($a = 0; $a < $i; $a++) { ?>
                <option value="<?= $data['pol']['data'][$a]['id_pol']; ?>"><?= $data['pol']['data'][$a]['jenis']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nama_dok">Nama Dokter</label>
        <select class="form-control" id="id_dok" name="id_dok">
            <?php
            $i = count($data['dok']['data']);

            for ($a = 0; $a < $i; $a++) { ?>
                <option value="<?= $data['dok']['data'][$a]['id_dok']; ?>"><?= $data['dok']['data'][$a]['nama_dok']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal-pukul">Tanggal</label>
        <input type="text" class="form-control" required="required" id="tanggal_pukul" name="tanggal_pukul">
    </div>
    <button type="submit" name="add" class="btn btn-success float-right">Add</button>
</form>
@endsection