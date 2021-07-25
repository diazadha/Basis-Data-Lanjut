<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-3">
                <div class="card-header">
                    <a href="" class='btn btn-sm btn-primary' data-toggle="modal" data-target="#exampleModal">Tambah Sub Menu</a>
                </div>
            </div>


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sub Menu Management</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
                                    <th scope="col">Titel Menu</th>
                                    <th scope="col">Sub Menu</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <form action="<?= base_url() . 'menu/submenu_edit'; ?>" method="post">
                                        <tr>
                                            <td scope="row"><?= $i; ?></td>
                                            <td><?= $sm['menu']; ?></td>
                                            <td><?= $sm['title']; ?></td>
                                            <td><?= $sm['url']; ?></td>
                                            <td align="center">
                                                <label>
                                                    <strong>
                                                        <?php
                                                        if ($sm['is_active'] != 0) {
                                                        ?>
                                                            <span class="badge badge-info mb-1">
                                                                <label class="form-check-label" for="non_aktif">
                                                                    <?php
                                                                    echo "Aktif" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <span class="badge badge-danger mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Non Aktif" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } ?>
                                                    </strong>
                                                </label>
                                            </td>
                                            <td align="center">
                                                <?= anchor('menu/submenu_edit/' . $sm['id_sub_menu'], '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?>
                                                <a href="<?= base_url('menu/deletesubmenu/'); ?><?= $sm['id_sub_menu']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?');"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </form>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu Title">
                    </div>
                    <div class="form-group">
                        <select name="id_menu" id="id_menu" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>