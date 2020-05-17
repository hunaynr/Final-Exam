<div class="container-fluid bg-dark" style="height: 601px;"><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 text-white">
            <div class="card bg-secondary">
                <div class="card-header">
                    <center>Form Edit Data Poliklinik</center>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post">
                        <input type="hidden" name="id_pol" value="<?= $poliklinik['id_pol']; ?>">
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $poliklinik['jenis']; ?>">
                            <!-- <small class="form-text text-danger"><?= form_error('jenis'); ?></small> -->
                        </div>
                        <div class="form-group">
                            <label for="ruang">Ruang</label>
                            <input type="text" class="form-control" id="ruang" name="ruang" value="<?= $poliklinik['ruang']; ?>">
                            <!-- <small class="form-text text-danger"><?= form_error('ruang'); ?></small> -->
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary float-right">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>
</div>