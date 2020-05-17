<div class="container-fluid bg-dark" style="height: 601px;"><br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 text-white">
            <div class="card bg-secondary">
                <div class="card-header">
                    <center>Form Edit Status User</center>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post">
                        <table class="table table-dark">
                            <tbody>
                                <tr>
                                    <th>
                                        Username
                                    </th>
                                    <td>
                                        <?= $user['username']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Password
                                    </th>
                                    <td>
                                        <?= $user['password']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Level
                                    </th>
                                    <td>
                                        <?= $user['level']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Status
                                    </th>
                                    <td>
                                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                        <select class="form-control" id="status" name="status">
                                            <?php foreach ($status as $key) : ?>
                                                <?php if ($key == $user['status']) : ?>
                                                    <option value="<?= $key ?>" selected><?= $key ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $key ?>"><?= $key ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" name="edit" class="btn btn-primary float-right">Edit</button>
                    </form>
                </div>
            </div><br>
            <a href="<?= base_url(); ?>authorization" class="btn btn-success float-right">Back</a>
        </div>
        <div class="col-2"></div>
    </div>
</div>