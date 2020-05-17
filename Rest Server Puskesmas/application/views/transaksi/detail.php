<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Poliklinik
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $poliklinik['jenis']; ?></h5>
                    <p class="card-text">
                        <label for=""><b> Hari Praktik : </b></label>
                        <?= $poliklinik['hari_praktik']; ?></p><br>
                    <a href="<?= base_url();?>poliklinik" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>