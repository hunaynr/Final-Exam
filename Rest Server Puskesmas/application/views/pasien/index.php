<!-- <?php
        var_dump($pasien);
        ?> -->
<div class="container-fluid bg-dark text-white" style="height: 601px;">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Pasien <strong> berhasil </strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="col-2">

            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
            <?php if (empty($pasien)) : ?>
                <div class="alert alert-danger" role="alert">
                    <center>Data Pasien tidak ditemukan</center>
                </div>
            <?php endif; ?>

            <br>
            <center>
                <h2>Daftar Pasien</h2>
            </center>

            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Pasien" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form><br>

            <style>
                #list_pas tbody tr {
                    color: white;
                    background-color: #000000;
                }

                #list_pas thead tr {
                    color: white;
                    background-color: #000000;
                }

                .dataTables_length,
                .dataTables_filter,
                .dataTables_info,
                .dataTables_processing,
                .dataTables_paginate {
                    color: white !important;
                }

                a.paginate_button,
                a.paginate_active {
                    display: inline-block;
                    background-color: white;
                    padding: 2px 6px;
                    margin-left: 2px;
                    cursor: pointer;
                    *cursor: hand;
                }

                a.paginate_active {
                    background-color: transparent;
                    border: 1px solid white;
                }

                a.paginate_button_disabled {
                    color: #ffffff;
                }

                .paging_full_numbers a:active {
                    outline: none
                }

                .paging_full_numbers a:hover {
                    text-decoration: none;
                }

                div.dataTables_paginate span>a {
                    width: 15px;
                    text-align: center;
                }

                div.dataTables_info {
                    padding: 9px 6px 6px 6px;
                }
            </style>

            <table class="table table-striped table-dark" id="list_pas">
                <thead>
                    <tr>
                        <th>
                            No
                        </th>
                        <th>
                            No KTP
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Jenis Kelamin
                        </th>
                        <th>
                            Alamat
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pasien as $psn) : ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $psn['no_ktp']; ?>
                            </td>
                            <td>
                                <?= $psn['nama_pas']; ?>
                            </td>
                            <td>
                                <?= $psn['jenis_kelamin']; ?>
                            </td>
                            <td>
                                <?= $psn['alamat']; ?>
                            </td>
                            <td>
                                <a class="btn btn-danger" style="color: #ffffff" href="<?= base_url(); ?>pasien/hapus/<?= $psn['id_pas']; ?>" onclick="return confirm('Yakin data ini akan dihapus ?');">Hapus</a>
                                <a class="btn btn-success" style="color: #ffffff" href="<?= base_url(); ?>pasien/edit/<?= $psn['id_pas']; ?>">
                                    Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#list_pas').DataTable();
                });
            </script>
        </div>
        <div class="col-2">

        </div>
    </div>
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
            <!-- <a href="<?= base_url(); ?>pasien/tambah" class="btn btn-primary">Tambah Data</a> -->
            <?php
            if ($this->session->userdata('level') == "admin") { ?>
                <a href="<?= base_url(); ?>pasien/pasien_pdf" class="btn btn-success">Print</a>
            <?php
            }
            ?>
        </div>
        <div class="col-2">

        </div>
    </div>
</div>