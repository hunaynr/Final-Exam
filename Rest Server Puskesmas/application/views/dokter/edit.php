<div class="container-fluid bg-dark" style="height: 601px;"><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 text-white">
        <div class="card bg-secondary">
            <div class="card-header">
                <center>Form Edit Data Dokter</center>
            </div>
            <div class="card-body">
            <?php if(validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
            </div>
            <?php endif ?>
                <form action="" method="post">
                    <input type="hidden" name="id_dok" value="<?= $dokter['id_dok'];?>">
                    <div class="form-group">
                        <label for="no_ktp">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip"
                        value="<?= $dokter['nip'];?>">
                        <!-- <small class="form-text text-danger"><?= form_error('nip'); ?></small> -->
                    </div>
                    <div class="form-group">
                        <label for="nama_dok">Nama</label>
                        <input type="text" class="form-control" id="nama_dok" name="nama_dok"
                        value="<?= $dokter['nama_dok'];?>">
                        <!-- <small class="form-text text-danger"><?= form_error('nama'); ?></small> -->
                    </div>            
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <?php foreach($jenis_kelamin as $key): ?>
                                <?php if($key == $dokter['jenis_kelamin']) : ?>
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
                        value="<?= $dokter['alamat'];?>">
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