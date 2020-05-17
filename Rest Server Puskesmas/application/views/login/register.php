<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<div class="container-fluid bg-dark" style="height: 657px;"><br>
    <title><?= $title ?></title><br><br><br><br>
    <?php if ($this->session->flashdata('flash-data-check')) : ?>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Failed :</strong> Username and passwaord <strong><?= $this->session->flashdata('flash-data-check'); ?></strong>
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
                        <h3 class="mb-0">Pick Username and Password</h3>
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
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
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
            <?php if ($this->session->flashdata('flash-data')) : ?>
                <a href="<?= base_url(); ?>login/register_next" class="btn btn-success float-right">Next</a>
            <?php else : ?>
                <a href="<?= base_url(); ?>login/index" class="btn btn-warning float-right">Login</a>
            <?php endif; ?>
        </div>
        <div class="col-6"></div>
    </div>
</div>