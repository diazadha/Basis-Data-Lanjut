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
                                    <select name="kategori" id="kategori" class="form-control" style="width: 100%">
                                        <?php foreach ($kategoritoko as $k) : ?>
                                            <option value="<?= $k->id ?>"><?= $k->nama_kategori ?> | <?= $k->nama_toko ?></option>
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
            <h5 class="m-0 font-weight-bold text-primary text-left ">Hasil Sorting : </h5>
            <h6 class="m-0 font-weight-bold text-secondary text-left mb-3">
                <?php foreach ($namatoko as $t) : ?><?= $t->nama_kategori ?> - <?= $t->nama_toko ?> <?php endforeach; ?> <br> Pada <?= $this->session->userdata('darivaf'); ?> s/d <?= $this->session->userdata('sampaivaf'); ?>
            </h6>
        </div>
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
                                <th scope="col">Tanggal</th>
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
                                    <td><?= $h->tanggal ?></td>
                                    <td><?= $h->nama_barang ?></td>
                                    <td><?= $h->nama_kategori ?></td>
                                    <td> Rp. <?= number_format($h->harga, 0, ',', '.') ?></td>
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