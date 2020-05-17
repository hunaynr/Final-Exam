<?= form_open('login/proses_login'); ?>
<div class="container-fluid bg-dark text-white" style="height: 657px;">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <br><br><br><br>
            <!-- form card login -->
            <!-- cek pesan -->
            <!-- <div class="alert alert-info role=" alert>
                        <?php
                        if (isset($pesan)) {
                            echo $pesan;
                        }
                        ?>
                    </div> -->
            <?php if ($this->session->flashdata('false')) : ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('false'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php else : ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <?php echo "Masukkan username dan password"; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('flash-data')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card bg-secondary">
                <div class="card-header">
                    <center>
                        <h3 class="mb-0">Login</h3>
                    </center>
                </div>
                <div class="card-body">
                    <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required="">
                            <div class="invalid-feedback">Oops, you missed this one</div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" id="password" required="" autocomplete="new-password">
                            <div class="invalid-feedback">Enter your password too!</div>
                        </div>
                        <button type="submit" class="btn btn-dark float-right" id="btnLogin">
                            Login</button>
                    </form>
                </div>
                <!-- card block -->
            </div>
            <!-- form card login -->
        </div>
        <div class="col-3 mt-2">
            <label class="float-right mb-0">Got no account yet?</label><br>
            <a href="<?= base_url(); ?>login/register" class="btn btn-primary float-right mt-2">Register</a>
        </div>
    </div>
    <!-- row -->
</div>
<!-- container -->

<?= form_close(); ?>