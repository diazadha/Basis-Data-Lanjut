<div class="container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/index') ?>">Semua Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/income') ?>">Performa Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/income_kategori') ?>">Pendapatan Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('sistemreport/report/favourite') ?>">Produk Terfavorit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/customer') ?>">Pelanggan Teraktif</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="card shadow mb-4">
                <div class="card-body text-right">
                    <form method="post" action="<?= base_url('sistemreport/report/favourite_result') ?> ">
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0 text-left">
                                <label>Dari </label>
                                <input type="date" name="dari" id="dari" class="form-control" placeholder="Format Y-m-d H:i:s">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0 text-left">
                                <label>Sampai</label>
                                <div class="input-group mb-3">
                                    <input type="date" name="sampai" id="sampai" class="form-control" placeholder="Format Y-m-d H:i:s">
                                </div>
                            </div>
                            <div class="col-xl-3 mb-3 mb-sm-0 text-left">
                                <label>Toko</label>
                                <div class="input-group mb-3">
                                    <select name="namatoko" id="namatoko" class="form-control" style="width: 100%">
                                        <?php foreach ($namatoko1 as $k) : ?>
                                            <option value="<?= $k->id ?>"><?= $k->nama_toko ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 mb-3 mb-sm-0 text-left">
                                <label>Kategori</label> <br>
                                <select name="kategori" id="kategori" class="form-control" style="width: 100%">

                                    <option value="">Pilih Kategori</option>

                                </select>
                                <button type="submit" class="btn btn-primary btn-md mt-3" aria-haspopup="true" aria-expanded="false" style="width: 100%">
                                    Tampilkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h5 class="m-0 font-weight-bold text-primary text-left ">Hasil Sorting : </h5>
            <h6 class="m-0 font-weight-bold text-secondary text-left">
                <?php foreach ($namatoko as $t) : ?><?= $t->nama_kategori ?> - <?= $t->nama_toko ?> <?php endforeach; ?> <br> Pada <?= $this->session->userdata('darivaf'); ?> s/d <?= $this->session->userdata('sampaivaf'); ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Produk Terfavorit</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Bulan-Tahun</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga Produk</th>
                                    <th scope="col">Terjual</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Toko</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($hasil as $h) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?php
                                            if ($h->Bulan != "0") {
                                                if ($h->Bulan == '1') {
                                                    $isBulan = 'Januari';
                                                } elseif ($h->Bulan == '2') {
                                                    $isBulan = 'Februari';
                                                } elseif ($h->Bulan == '3') {
                                                    $isBulan = 'Maret';
                                                } elseif ($h->Bulan == '4') {
                                                    $isBulan = 'April';
                                                } elseif ($h->Bulan == '5') {
                                                    $isBulan = 'Mei';
                                                } elseif ($h->Bulan == '6') {
                                                    $isBulan = 'Juni';
                                                } elseif ($h->Bulan == '7') {
                                                    $isBulan = 'Juli';
                                                } elseif ($h->Bulan == '8') {
                                                    $isBulan = 'Agustus';
                                                } elseif ($h->Bulan == '9') {
                                                    $isBulan = 'September';
                                                } elseif ($h->Bulan == '10') {
                                                    $isBulan = 'Oktober';
                                                } elseif ($h->Bulan == '11') {
                                                    $isBulan = 'Nopember';
                                                } elseif ($h->Bulan == '12') {
                                                    $isBulan = 'Desember';
                                                } elseif ($h->Bulan == '00') {
                                                    $isBulan = '00';
                                                }
                                            }
                                            echo $isBulan . ' - ' . $h->Tahun;
                                            ?></td>
                                        <td align="left"><?= $h->nama_barang ?></td>
                                        <td><?= $h->nama_kategori ?></td>
                                        <td align="right"> Rp. <?= number_format($h->harga, 0, ',', '.') ?></td>
                                        <td><?= $h->terjual ?></td>
                                        <td><?= $h->stok_barang ?></td>
                                        <?php $namatoko = $h->nama_toko;
                                        $sub = substr($namatoko, 0, 13); ?>
                                        <td><?= $sub ?>..</td>
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