<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title><?= $title ?></title>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css" />
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
</head>

<body>

  <navbar>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <div class="row">
          <ul class="navbar-nav mx-auto">
            <?php if ($this->session->userdata('level') == "admin") : ?>
              <?php for ($i = 0; $i < 20; $i++) : ?>
                <a class="nav-item nav-link"></a>
              <?php endfor; ?>
              <a class="nav-item nav-link" style="color: #ffffff" href="<?= base_url(); ?>home_admin/index">Home</a>
            <?php elseif ($this->session->userdata('level') == "user") : ?>
              <?php for ($i = 0; $i < 27; $i++) : ?>
                <a class="nav-item nav-link"></a>
              <?php endfor; ?>
              <a class="nav-item nav-link" style="color: #ffffff" href="<?= base_url(); ?>home_user/index">Home</a>
            <?php endif; ?>
            <?php
            if ($this->session->userdata('level') == "admin") { ?>
              <a class="nav-item nav-link" style="color: #ffffff" href="<?= base_url(); ?>authorization">Authorization</a>
              <a class="nav-item nav-link" style="color: #ffffff" href="<?= base_url(); ?>pasien">Pasien</a>
              <a class="nav-item nav-link" style="color: #ffffff" href="<?= base_url(); ?>dokter">Dokter</a>
              <a class="nav-item nav-link" style="color: #ffffff" href="<?= base_url(); ?>poliklinik">Poliklinik</a>
              <a class="nav-item nav-link" style="color: #ffffff" href="<?= base_url(); ?>transaksi">Transaksi</a>
            <?php
            } elseif ($this->session->userdata('level') == "user") {
            ?>
              <a class="nav-item nav-link" style="color: #ffffff" href="<?= base_url(); ?>dokter">Dokter</a>
              <a class="nav-item nav-link" style="color: #ffffff" href="<?= base_url(); ?>poliklinik">Poliklinik</a>
            <?php
            }
            ?>
            <a class="nav-item nav-link" style="color: #ffffff" href=" <?= base_url() . 'login/logout'; ?>">Logout</a>
          </ul>
        </div>
      </div>
    </nav>
  </navbar>