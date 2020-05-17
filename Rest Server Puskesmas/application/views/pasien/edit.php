<div class="container-fluid bg-dark" style="height: 601px;"><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 text-white">
        <div class="card bg-secondary">
            <div class="card-header">
                <center>Form Edit Data Pasien</center>
            </div>
            <div class="card-body">
            <?php if(validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
            </div>
            <?php endif ?>
                <form action="" method="post">
                    <input type="hidden" name="id_pas" value="<?= $pasien['id_pas'];?>">
                    <div class="form-group">
                        <label for="no_ktp">No KTP</label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp"
                        value="<?= $pasien['no_ktp'];?>">
                        <!-- <small class="form-text text-danger"><?= form_error('no_ktp'); ?></small> -->
                    </div>
                    <div class="form-group">
                        <label for="nama_pas">Nama</label>
                        <input type="text" class="form-control" id="nama_pas" name="nama_pas"
                        value="<?= $pasien['nama_pas'];?>">
                        <!-- <small class="form-text text-danger"><?= form_error('nama'); ?></small> -->
                    </div>            
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <?php foreach($jenis_kelamin as $key): ?>
                                <?php if($key == $pasien['jenis_kelamin']) : ?>
                                    <option value="<?= $key ?>"selected><?= $key ?></option>
                                <?php else :?>
                                    <option value="<?= $key ?>"><?= $key ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                        value="<?= $pasien['alamat'];?>">
                        <!-- <small class="form-text text-danger"><?= form_error('alamat'); ?></small> -->
                    </div> 
                    <button type="submit" name="edit" class="btn btn-primary float-right">Edit</button>
                </form>
            </div>
        </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>