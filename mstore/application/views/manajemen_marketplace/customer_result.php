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
                    <a class="nav-link " href="<?= base_url('sistemreport/report/income_kategori') ?>">Pendapatan Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/favourite') ?>">Produk Terfavorit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('sistemreport/report/customer') ?>">Pelanggan Teraktif</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <form method="post" action="<?= base_url('sistemreport/report/customer_result') ?> ">
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
                            <select name="toko" id="toko" class="form-control" style="width: 100%">
                                <?php foreach ($tokosemua as $k) : ?>
                                    <option value="<?= $k->id ?>"><?= $k->nama_toko ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 mb-3 mb-sm-0 text-left">
                        <label>Aksi</label> <br>
                        <button type="submit" class="btn btn-primary btn-md" aria-haspopup="true" aria-expanded="false" style="width: 100%">
                            Tampilkan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <h5 class="mt-3 m-0 font-weight-bold text-primary text-left ">Hasil Sorting : </h5>
    <h6 class="m-0 font-weight-bold text-secondary text-left mb-3">
        <?php foreach ($daritoko as $t) : ?><?= $t->nama_toko ?> <?php endforeach; ?> <br>Pada <?= $this->session->userdata('dari'); ?> s/d <?= $this->session->userdata('sampai'); ?>
    </h6>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pelanggan Teraktif</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead align="center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Bulan-Tahun</th>
                            <th scope="col">Pelanggan</th>
                            <th scope="col">No. Handphone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jumlah Transaksi</th>
                            <th scope="col">Toko</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $total = 0;
                        foreach ($hasil as $r) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td align="center">
                                    <?php
                                    if ($r->Bulan != "0") {
                                        if ($r->Bulan == '1') {
                                            $isBulan = 'Januari';
                                        } elseif ($r->Bulan == '2') {
                                            $isBulan = 'Februari';
                                        } elseif ($r->Bulan == '3') {
                                            $isBulan = 'Maret';
                                        } elseif ($r->Bulan == '4') {
                                            $isBulan = 'April';
                                        } elseif ($r->Bulan == '5') {
                                            $isBulan = 'Mei';
                                        } elseif ($r->Bulan == '6') {
                                            $isBulan = 'Juni';
                                        } elseif ($r->Bulan == '7') {
                                            $isBulan = 'Juli';
                                        } elseif ($r->Bulan == '8') {
                                            $isBulan = 'Agustus';
                                        } elseif ($r->Bulan == '9') {
                                            $isBulan = 'September';
                                        } elseif ($r->Bulan == '10') {
                                            $isBulan = 'Oktober';
                                        } elseif ($r->Bulan == '11') {
                                            $isBulan = 'Nopember';
                                        } elseif ($r->Bulan == '12') {
                                            $isBulan = 'Desember';
                                        } elseif ($r->Bulan == '00') {
                                            $isBulan = '00';
                                        }
                                    }
                                    echo $isBulan . ' - ' . $r->Tahun;
                                    ?></td>
                                <td align="left"><?= $r->nama_pemesan ?></td>
                                <td align="center"><?= $r->hp_pemesan ?></td>
                                <td align="left"><?= $r->email ?></td>
                                <td align="center"><?= $r->Jumlah_Transaksi ?></td>
                                <?php $namatoko = $r->nama_toko;
                                $sub = substr($namatoko, 0, 13); ?>
                                <td align="center"><?= $sub ?>..</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>