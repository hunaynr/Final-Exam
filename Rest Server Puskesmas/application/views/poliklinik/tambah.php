<div class="container-fluid bg-dark" style="height: 601px;"><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 text-white">
            <div class="card bg-secondary">
                <div class="card-header">
                    <center>Form Tambah Data Poliklinik</center>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" class="form-control" id="jenis" name="jenis">
                        </div>
                        <div class="form-group">
                            <label for="nama">Ruang</label>
                            <input type="text" class="form-control" id="ruang" name="ruang">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>