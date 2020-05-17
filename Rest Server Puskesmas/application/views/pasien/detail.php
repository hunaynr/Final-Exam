<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Pasien
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $pasien['nama_pas']; ?></h5>
                    <p class="card-text">
                        <label for=""><b> No KTP : </b></label>
                        <?= $pasien['no_ktp']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Nama : </b></label>
                        <?= $pasien['nama_pas']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Jenis Kelamin : </b></label>
                        <?= $pasien['jenis_kelamin']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Alamat : </b></label>
                        <?= $pasien['alamat']; ?></p><br>
                    <a href="<?= base_url();?>pasien" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>