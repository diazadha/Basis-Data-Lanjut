<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


            <ul class="navbar-nav mr-auto ml-3">
                <li class="navbar-nav">
                    <h5><strong>
                            <a class="brand d-flex align-items-center justify-content-center" href="<?php echo site_url('Marketplace/index') ?>" style="text-decoration: none">
                                <div class="brand-icon rotate-n-15">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div class="brand-text mx-2">MarketPlace</div>
                            </a>
                        </strong>
                    </h5>
                </li>

                <li class="navbar-nav ml-4">
                    <div class="dropdown show">
                        <small>
                            <a class="btn btn-sm btn-primary m-0 font-weight-bold dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-list"></i> Kategori
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php foreach ($kategorisemua as $k) : ?>
                                    <a class="dropdown-item" href="<?= base_url('marketplace/kategorisemuatoko/' . $k->nama_kategori) ?>"><?= $k->nama_kategori ?></a>
                                <?php endforeach; ?> </h6>
                            </div>
                        </small>
                    </div>
                </li>

                <!-- Topbar Search -->
                <li class="navbar-nav ml-4">
                    <?= form_open("marketplace/search"); ?>
                    <div class="input-group">
                        <input type="text" style="width:350px;" class="form-control bg-light border-1 small" placeholder="Pencarian..." aria-label="Search" aria-describedby="basic-addon2" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </li>
            </ul>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <form method="post" action="<?= base_url('marketplace/outlet') ?> ">
                        <a class="nav-link" data-toggle="tooltip" title="Semua Toko">
                            <small>
                                <button type="submit" class="btn btn-sm btn-primary m-0 font-weight-bold ">
                                    <i class="fas fa-store xl"></i>
                                    Toko
                                </button>

                            </small>
                        </a>
                    </form>
                </li>
                <!-- Nav Item - Alerts -->
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <form method="post" action="<?= base_url('marketplace/detailcart') ?> ">
                        <a class="nav-link" data-toggle="tooltip" title="Keranjang Belanja">
                            <button type="submit" class="btn btn-sm btn-primary">

                                <!-- Counter - Messages -->

                                <i class="fas fa-shopping-cart"></i>
                                <?php $keranjang = $this->cart->total_items() ?>
                                <?= $keranjang ?>

                            </button>
                        </a>

                    </form>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <small>
                            <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-map-marked-alt"></i>
                                <?php foreach ($lokasi as $lk) : ?>
                                    <?= $lk->desa ?>
                                <?php endforeach; ?> </h6>
                        </small>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Lokasi Terdekat
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <form action="<?php echo base_url('Marketplace/update_alamat'); ?>" method="POST">
                                <div class="form-group row">
                                    Kabupaten/Kota
                                    <input type="text" name="desa" class="form-control " id="desa" value="<?= $lk->desa ?>">
                                </div>
                                <div class="form-group row">
                                    Kodepos
                                    <input type="text" name="kodepos" class="form-control " id="kodepos" value="<?= $lk->kodepos ?>">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm" aria-haspopup="true" aria-expanded="false" style="width: 100%">
                                    Simpan
                                </button>
                            </form>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </li>



            </ul>
        </nav>
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
        <?= $this->session->flashdata('message'); ?>
        <!-- End of Topbar -->