<div class="container-fluid">
    <div class="row">
        <div class="card text-center col-xl-8 col-lg-7">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active">Profile Toko</a>
                    </li>
                </ul>
            </div>
            <div class="card shadow mb-4 mt-3">
                <!-- Card Body -->
                <div class="card-body text-left">
                    <?php foreach ($detailtoko as $p) : ?>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Nama Toko
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="nama_toko" class="form-control " id="nama_toko" placeholder="Store Name" value="<?= $p->nama_toko ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Nomor Kontak
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="kontak_toko" class="form-control " id="kontak_toko" placeholder="Store Name" value="<?= $p->kontak_toko ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Alamat
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="kota_toko" class="form-control " id="kota_toko" placeholder="Kota Toko" value="<?= $p->kota_toko ?>" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="kodepos_toko" class="form-control " id="kodepos_toko" placeholder="Postal Code" value="<?= $p->kodepos_toko ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                            </div>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="alamat_toko" id="alamat_toko" cols="3" readonly> <?= $p->alamat_toko ?> </textarea>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            Jumlah Admin Toko
                        </div>
                        <div class="col-sm-2">
                            <?php foreach ($jumlahadmin as $p) : ?>
                                <input type="text" name="kota_toko" class="form-control " id="kota_toko" placeholder="Kota Toko" value="<?= $p->jumlah ?>" readonly>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('sistemreport/report/index') ?>">
                            <div class="btn btn-sm btn-secondary">Kembali</div>
                        </a>
                    </div>
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
                        <?php foreach ($detailtoko as $p) : ?>
                            <img src="<?= base_url('assets/img/profile/') . $p->foto_toko; ?>" class="card-img" alt="...">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>