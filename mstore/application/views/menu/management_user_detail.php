<div class="container-fluid">
    <div class="row">
        <div class="card text-center col-xl-8 col-lg-7 mb-3">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('profil_toko/index') ?>">Profil Admin</a>
                    </li>
                </ul>
            </div>
            <div class="card shadow mb-4 mt-3">
                <!-- Card Body -->
                <div class="card-body text-left">
                    <?php foreach ($admin as $p) : ?>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Nama
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="nama_toko" class="form-control " id="nama_toko" placeholder="Store Name" value="<?= $p->name ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Email
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="kontak_toko" class="form-control " id="kontak_toko" placeholder="Store Name" value="<?= $p->email ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Alamat
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="kota_toko" class="form-control " id="kota_toko" placeholder="Kota Toko" value="<?= $p->kota_admin ?>" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="kodepos_toko" class="form-control " id="kodepos_toko" placeholder="Postal Code" value="<?= $p->kodepos ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                            </div>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="alamat_toko" id="alamat_toko" cols="3" readonly> <?= $p->alamat_admin ?> </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Karyawan
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="date_created" class="form-control " id="date_created" value="<?= $p->nama_toko ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Bergabung Sejak
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="date_created" class="form-control " id="date_created" value="<?= date('d F Y', $p->date_created); ?>" readonly>
                            </div>
                        </div>
                        <form action="<?= base_url() . 'management_user/update'; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    Status Akun
                                </div>
                                <div class="col-sm-9">
                                    <label>
                                        <strong>
                                            <?php
                                            if ($p->is_active != 0) {
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
                                        </strong> </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="<?= base_url('management_user/index') ?>">
                                    <div class="btn btn-sm btn-secondary">Kembali</div>
                                </a>
                                <button type="submit" class="btn btn-success btn-sm" aria-haspopup="true" aria-expanded="false">
                                    Update
                                </button>
                            </div>
                            <input type="hidden" class="form-control" name="id_admin" value="<?= $p->id_admin ?>">
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Gambar</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="col 1 mt-2 mb-4" align="center">
                        <img src="<?= base_url('assets/img/profile/') . $p->image; ?>" class="card-img" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>