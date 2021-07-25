<div class="container-fluid">


    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Sub Menu Management</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="<?= base_url() . 'menu/submenu_update'; ?>" method="post">
                <?php foreach ($edit as $menu) : ?> <?php endforeach; ?>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        Titel Menu
                        <input type="text" name="menu" class="form-control" value="<?= $menu->menu ?>">
                    </div>
                    <div class="col-sm-6">
                        Sub Menu
                        <input type="text" name="title" class="form-control" value="<?= $menu->title ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        URL
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">localhost/mstore/</span>
                            </div>
                            <input type="text" name="url" class="form-control" value="<?= $menu->url ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        Icon Menu
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Icon</span>
                            </div>
                            <input type="text" name="icon" class="form-control" value="<?= $menu->icon ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        Status
                    </div>
                    <div class="col-sm-7 mb-3 mb-sm-0">
                        <label>
                            <strong>
                                <?php
                                if ($menu->is_active != 0) {
                                ?>
                                    <span class="badge badge-info mb-1">
                                        <label class="form-check-label">
                                            <?php
                                            echo "Aktif" ?>
                                        </label>
                                    </span>
                                    </br>
                                    <label for="non_aktif">
                                        <input class="form-check-input" type="checkbox" value="0" name="non_aktif" id="non_aktif">
                                        <font align="italic"><span class="badge badge-danger">Non Aktif</span></font>
                                    </label>
                                <?php
                                } else {
                                ?>
                                    <span class="badge badge-danger mb-1">
                                        <label class="form-check-label">
                                            <?php
                                            echo "Non Aktif" ?>
                                        </label>
                                    </span>
                                    </br>
                                    <label for="non_aktif">
                                        <input class="form-check-input" type="checkbox" value="1" name="aktif" id="aktif">
                                        <font align="italic"><span class="badge badge-info mb-1"> Aktif</span> </font>
                                    </label>
                                <?php
                                } ?>
                            </strong>
                        </label>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <a href="<?= base_url('menu/submenu') ?>">
                <div class="btn btn-sm btn-secondary">Kembali</div>
            </a>
            <input type="hidden" class="form-control" name="id_sub_menu" value="<?= $menu->id_sub_menu ?>">
            <button type="submit" class="btn btn-success btn-sm">Update</button>
        </div>
        </form>
    </div>
</div>
</div>