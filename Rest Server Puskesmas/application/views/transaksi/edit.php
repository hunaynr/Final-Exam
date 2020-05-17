<div class="container-fluid bg-dark" style="height: 601px;"><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 text-white">
        <div class="card bg-secondary">
            <div class="card-header">
            <center>Form Edit Data Transaksi</center>
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
                            <?php foreach($pasien as $key): ?>
                                <?php if($key['id_pas'] == $transaksi['id_pas']) : ?>
                                    <option value="<?= $transaksi['id_pas'] ?>" selected><?= $key['nama_pas'] ?>
                                <?php else :?>
                                    <option value="<?= $key['id_pas'] ?>"><?= $key['nama_pas'] ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis">Nama Poliklinik</label>
                        <select class="form-control" id="id_pol" name="id_pol">
                            <?php foreach($poliklinik as $key): ?>
                                <?php if($key['id_pol'] == $transaksi['id_pol']) : ?>
                                    <option value="<?= $transaksi['id_pol'] ?>" selected><?= $key['jenis'] ?>
                                <?php else :?>
                                    <option value="<?= $key['id_pol'] ?>"><?= $key['jenis'] ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_dok">Nama Dokter</label>
                        <select class="form-control" id="id_dok" name="id_dok">
                            <?php foreach($dokter as $key): ?>
                                <?php if($key['id_dok'] == $transaksi['id_dok']) : ?>
                                    <option value="<?= $transaksi['id_dok'] ?>" selected><?= $key['nama_dok'] ?>
                                <?php else :?>
                                    <option value="<?= $key['id_dok'] ?>"><?= $key['nama_dok'] ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                <input type="hidden" name="id_trans" value="<?= $transaksi['id_trans'];?>">               
                    <div class="form-group">
                        <label for="tanggal_pukul">Tanggal</label>
                        <input type="text" class="form-control" id="tanggal_pukul" name="tanggal_pukul"
                        value="<?= $transaksi['tanggal_pukul']?>">
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary float-right">Edit</button>
                </form>
            </div>
        </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>