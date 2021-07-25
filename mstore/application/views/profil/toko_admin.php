<div class="container-fluid">
    <div class="row">

        <div class="card text-center col-xl-8 col-lg-7">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('profil_toko/index') ?>">Profil Toko</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('sistemreport/report/income') ?>">Profil Admin</a>
                    </li>

                </ul>
            </div>
            <div class="card shadow mb-4 mt-3">
                <!-- Card Body -->
                <div class="card-body text-left">
                    <?php foreach ($profil as $p) : ?>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Nama
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control " id="name" value="<?= $p->name ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Email
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control " id="email" value="<?= $p->email ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Alamat
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="kota_admin" class="form-control " id="kota_admin" value="<?= $p->kota_admin ?>" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="kodepos" class="form-control " id="kodepos" placeholder="Postal Code" value="<?= $p->kodepos ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                            </div>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="alamat_admin" id="alamat_admin" cols="3" readonly> <?= $p->alamat_admin ?> </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Sejak
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="date_created" class="form-control " id="date_created" value="<?= date('d F Y', $p->date_created); ?>" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-sm" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#updateadmin">
                                Update
                            </button>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>



        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Foto Admin</h6>
                </div>
                <!-- Card Body -->
                <form action="<?= base_url() . 'profil_toko/update_img'; ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="col 1 mt-2 mb-4" align="center">
                            <img src="<?= base_url('assets/img/profile/') . $p->image; ?>" class="card-img" alt="...">
                        </div>
                        <div class="form-group">
                            <input type="file" name="foto_admin" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success btn-sm" style="width: 100%" aria-haspopup="true" aria-expanded="false">
                            Update Foto
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="updateadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content modal-md">
                <div class="modal-header modal-md">
                    <h5 class="modal-title" id="exampleModalLongTitle">Updata Data Profile Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form action="<?= base_url() . 'profil_toko/update_admin'; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Nama
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control " id="name" value="<?= $p->name ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Email
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control " id="email" value="<?= $p->email ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Alamat
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="kota_admin" placeholder="City" class="form-control " id="kota_admin" value="<?= $p->kota_admin ?>">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="kodepos" placeholder="Postal Code" class="form-control " id="kodepos" placeholder="Postal Code" value="<?= $p->kodepos ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                            </div>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="alamat_admin" id="alamat_admin" placeholder="Address" cols="3"> <?= $p->alamat_admin ?> </textarea>
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
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>