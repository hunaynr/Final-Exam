<div class="container-fluid bg-dark" style="height: 601px;"><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 text-white">
        <div class="card bg-secondary">
            <div class="card-header">
                <center>Form Tambah Data Transaksi</center>
            </div>
            <div class="card-body">
            <?php if(validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
            </div>
            <?php endif ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama_pas">Nama Pasien</label>
                        <select class="form-control" id="id_pas" name="id_pas">
                            <?php foreach($nama_pas as $key): ?>
                                <option value="<?= $key['id_pas'] ?>" selected><?= $key['nama_pas'] ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Nama Poliklinik</label>
                        <select class="form-control" id="id_pol" name="id_pol">
                            <?php foreach($jenis as $key1): ?>
                                <option value="<?= $key1['id_pol'] ?>" selected><?= $key1['jenis'] ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_dok">Nama Dokter</label>
                        <select class="form-control" id="id_dok" name="id_dok">
                            <?php foreach($nama_dok as $key2): ?>
                                <option value="<?= $key2['id_dok'] ?>" selected><?= $key2['nama_dok'] ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pukul">Tanggal</label>
                        <input type="text" class="form-control" id="tanggal_pukul" name="tanggal_pukul">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>