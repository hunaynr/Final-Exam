<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<div class="container-fluid bg-dark" style="height: 740px;"><br>
    <title><?= $title ?></title><br><br>
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Username and password <strong><?= $this->session->flashdata('flash-data'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="col-3">

            </div>
        </div>

    <?php endif; ?>
    <?php if ($this->session->flashdata('flash-data-diri')) : ?>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Register process <strong><?= $this->session->flashdata('flash-data-diri'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="col-3">

            </div>
        </div>

    <?php endif; ?>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 text-white">
            <div class="card bg-secondary">
                <div class="card-header">
                    <center>
                        <h3 class="mb-0">Fill in these fields</h3>
                    </center>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="no_ktp">No KTP</label>
                            <input type="text" class="form-control" id="no_ktp" name="no_ktp">
                        </div>
                        <div class="form-group">
                            <label for="nama_pas">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pas" name="nama_pas">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <?php foreach ($jenis_kelamin as $key) : ?>
                                    <option value="<?= $key ?>" selected><?= $key ?>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_pas">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6"><br>
            <?php if ($this->session->flashdata('flash-data-diri')) : ?>
                <a href="<?= base_url(); ?>login/index" class="btn btn-success float-right">Login</a>
            <?php endif; ?>
        </div>
        <div class="col-6"></div>
    </div>
</div>