@extends('masterCard')

@section('title', 'Edit Transaksi')

@section('card_title', 'Edit Data Transaksi')

@section('content')
<form action="/puskesmas/update" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="<?= $data['trans']['id_trans']; ?>">
    <div class="form-group">
        <label for="nama_pas">Nama Pasien</label>
        <select class="form-control" id="id_pas" name="id_pas">
            <?php
            $i = count($data['pas']['data']);
            $j = $data['trans']['id_pas'];

            for ($a = 0; $a < $i; $a++) {
                if ($j == $data['pas']['data'][$a]['id_pas']) { ?>
                    <option value="<?= $data['trans']['id_pas']; ?>" selected><?= $data['pas']['data'][$a]['nama_pas']; ?></option>
                <?php } else { ?>
                    <option value="<?= $data['pas']['data'][$a]['id_pas']; ?>"><?= $data['pas']['data'][$a]['nama_pas']; ?></option>
            <?php }
            } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jenis">Nama Poliklinik</label>
        <select class="form-control" id="id_pol" name="id_pol">
            <?php
            $i = count($data['pol']['data']);
            $j = $data['trans']['id_pol'];

            for ($a = 0; $a < $i; $a++) {
                if ($j == $data['pol']['data'][$a]['id_pol']) { ?>
                    <option value="<?= $data['trans']['id_pol']; ?>" selected><?= $data['pol']['data'][$a]['jenis']; ?></option>
                <?php } else { ?>
                    <option value="<?= $data['pol']['data'][$a]['id_pol']; ?>"><?= $data['pol']['data'][$a]['jenis']; ?></option>
            <?php }
            } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nama_dok">Nama Dokter</label>
        <select class="form-control" id="id_dok" name="id_dok">
            <?php
            $i = count($data['dok']['data']);
            $j = $data['trans']['id_dok'];

            for ($a = 0; $a < $i; $a++) {
                if ($j == $data['dok']['data'][$a]['id_dok']) { ?>
                    <option value="<?= $data['trans']['id_dok']; ?>" selected><?= $data['dok']['data'][$a]['nama_dok']; ?></option>
                <?php } else { ?>
                    <option value="<?= $data['dok']['data'][$a]['id_dok']; ?>"><?= $data['dok']['data'][$a]['nama_dok']; ?></option>
            <?php }
            } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal-pukul">Tanggal</label>
        <input type="text" class="form-control" required="required" id="tanggal_pukul" name="tanggal_pukul" value="<?= $data['trans']['tanggal_pukul']; ?>">
    </div>
    <button type="submit" name="edit" class="btn btn-primary float-right">Save</button>
</form>
@endsection