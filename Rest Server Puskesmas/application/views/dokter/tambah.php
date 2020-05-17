<div class="container-fluid bg-dark" style="height: 601px;"><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 text-white">
        <div class="card bg-secondary">
            <div class="card-header">
                <center>Form Tambah Data Pasien</center>
            </div>
            <div class="card-body">
            <?php if(validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
            </div>
            <?php endif ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="no_ktp">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="form-group">
                        <label for="nama_dok">Nama</label>
                        <input type="text" class="form-control" id="nama_dok" name="nama_dok">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <?php foreach($jenis_kelamin as $key): ?>
                                <option value="<?= $key ?>" selected><?= $key ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>