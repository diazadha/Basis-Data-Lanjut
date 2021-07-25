<div class="container-fluid">


    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('sistemreport/report/index') ?>">Semua Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('sistemreport/report/income') ?>">Performa Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/income_kategori') ?>">Pendapatan Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/favourite') ?>">Produk Terfavorit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/customer') ?>">Pelanggan Teraktif</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="card shadow mb-4">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Semua Toko</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Toko</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Kodepos</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($tampil as $tk) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><img class="card-img-center" style="width:280px; height:150px;" src="<?= base_url() . '/assets/img/profile/' . $tk->foto_toko ?>" style="border:2px ridge #0404B4;">
                                        </td>
                                        <td><?= $tk->nama_toko ?></td>
                                        <td><?= $tk->kota_toko ?></td>
                                        <td><?= $tk->kodepos_toko ?></td>
                                        <td>
                                            <center>
                                                <?= anchor('sistemreport/report/report_result/' . $tk->id, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?>
                                            </center>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>