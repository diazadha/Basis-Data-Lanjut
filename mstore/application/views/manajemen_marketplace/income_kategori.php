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
                    <a class="nav-link active" href="<?= base_url('sistemreport/report/income_kategori') ?>">Pendapatan Toko</a>
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
                <div class="card-body text-right">
                    <form method="post" action="<?= base_url('sistemreport/report/proses_income_kategori') ?> ">
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
                                        <?php foreach ($namatoko as $k) : ?>
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
        </div>
    </div>
</div>