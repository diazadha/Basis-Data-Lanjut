<div class="container-fluid">
    <center>
        <div style="width: 950px">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardbatas" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <font align="left">
                        <h6 class="m-0 font-weight-bold text-primary">Status Pesanan </h6>
                    </font>
                </a>
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <!-- Content Row -->
                        <div class="row">
                            <?php foreach ($cekpesanan as $p) : ?>
                            <?php endforeach; ?>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6 mb-4" data-toggle="modal" data-target="#statusbayar">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Status Pembayaran</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <strong>
                                                        <?php
                                                        if ($p->status_bayar == "0" and $p->foto_bukti != "0") {
                                                        ?>
                                                            <span class="badge badge-info mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Bukti telah dikirim" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else if ($p->status_bayar == "SUKSES") {
                                                        ?>
                                                            <span class="badge badge-success mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Pembayaran Sukses" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <span class="badge badge-danger mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Pembayaran Gagal" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-money-bill-wave fa-3x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4" data-toggle="modal" data-target="#prosespesanan">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Proses Pesanan</div>

                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <strong>
                                                        <?php
                                                        if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikemas") {
                                                        ?>
                                                            <span class="badge badge-info mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Pesanan Dikemas" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikirim Penjual") {
                                                        ?>
                                                            <span class="badge badge-success mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Dikirim Penjual" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else if ($p->status_bayar == "GAGAL") {
                                                        ?>
                                                            <span class="badge badge-danger mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Tidak Dapat di Proses" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else if ($p->status_bayar == "0") {
                                                        ?>
                                                            <span class="badge badge-warning mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Pending" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else if ($p->status_bayar == "SUKSES") {
                                                        ?>
                                                            <span class="badge badge-warning mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Pending" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-3x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-4" data-toggle="modal" data-target="#resipengiriman">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Resi Pengiriman <?= $p->nama_armada ?></div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"> <strong>
                                                        <?php
                                                        if ($p->status_bayar == "0" and $p->status_pesanan == "0" and $p->resi_kurir == "0") {
                                                        ?>
                                                            <span class="badge badge-warning mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Pending" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikirim Penjual" and $p->resi_kurir != "0") {
                                                        ?>
                                                            <span class="badge badge-success mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo $p->resi_kurir ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "0") {
                                                        ?>
                                                            <span class="badge badge-warning mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Pending" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikemas") {
                                                        ?>
                                                            <span class="badge badge-warning mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Pending" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikirim Penjual") {
                                                        ?>
                                                            <span class="badge badge-info mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Input Resi Pengiriman" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else if ($p->status_bayar == "GAGAL" and $p->status_pesanan == "0") {
                                                        ?>
                                                            <span class="badge badge-danger mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Tidak Dapat di Proses" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <span class="badge badge-danger mb-1">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                    echo "Tidak Dapat di Proses" ?>
                                                                </label>
                                                            </span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-truck fa-3x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardAlamat" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <font align="left">
                        <h6 class="m-0 font-weight-bold text-primary">Alamat Pengiriman</h6>
                    </font>
                </a>
                <div class="collapse show" id="collapseCardAlamat">
                    <div class="card-body">
                        <font align="left">
                            <?php foreach ($cekpesanan as $p) : ?>
                            <?php endforeach; ?>
                            <div class="row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label>Nama Pembeli</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    : <?= $p->nama_pemesan ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label>Email</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    : <?= $p->email ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label>No. Handphone</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    : <?= $p->hp_pemesan ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    : <?= $p->alamat ?>, <?= $p->kota_pemesan ?> <?= $p->kodepos ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label>Tanggal Transaksi</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    : <?= $p->batas_bayar ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label>Metode Bayar</label>
                                </div>
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    : <?= $p->metode_bayar ?> <?= $p->mitra_bayar ?> <?= $p->rekening ?> A/N <?= $p->pemilik ?>
                                </div>
                            </div>

                        </font>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardA" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <font align="left">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
                    </font>
                </a>
                <div class="collapse show" id="collapseCardA">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr align="center">
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($cekpesanan as $psn) :
                                        $subtotal = $psn->jumlah * $psn->harga;
                                        $total += $subtotal;
                                    ?>
                                        <tr>
                                            <td align="center"><?= $psn->id_barang ?></td>
                                            <td align="center"><?= $psn->nama_barang ?></td>
                                            <td align="center"><?= $psn->jumlah ?></td>
                                            <td align="right">Rp. <?= number_format($psn->harga, 0, ',', '.') ?></td>
                                            <td align="right">Rp. <?= number_format($subtotal, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="4" align="right"><strong>Total Belanja</strong></td>
                                        <td align="right"><strong>Rp. <?= number_format($total, 0, ',', '.') ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="right"><strong>Pengiriman <?= $psn->nama_armada ?> <?= $psn->layanan ?></strong></td>
                                        <td align="right"><strong>Rp. <?= number_format($psn->ongkir, 0, ',', '.') ?></strong></td>
                                    </tr>
                                    <tr>

                                        <td colspan="4" align="right"><strong>Grand Total</strong></td>
                                        <td align="right"><strong>Rp. <?= number_format($total + $psn->ongkir, 0, ',', '.') ?></strong></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</center>
</div>