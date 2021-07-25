<div class="container-fluid">
    <h4 class="m-0 font-weight-bold text-secondary mb-3 mt-4">Detail Pesanan <div class="btn btn-sm btn-success">INVOICE: <?= $invoice->id ?></div>
        <a class="btn btn-sm btn-warning" href="<?php echo base_url('toko/invoice/pdf/' . $invoice->id) ?>"><i class="fa fa-file"></i> Export PDF</a>
    </h4>
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Status Pesanan</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <!-- Content Row -->
                <div class="row">
                    <?php foreach ($statuspesanan as $p) : ?>
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
                                                } else if ($p->status_bayar == "0" and $p->foto_bukti == "0") {
                                                ?>
                                                    <span class="badge badge-warning mb-1">
                                                        <label class="form-check-label">
                                                            <?php
                                                            echo "Pending" ?>
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
            <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-address-book"></i> Alamat Pengiriman </h6>
        </a>
        <div class="collapse show" id="collapseCardAlamat">
            <div class="card-body">
                <?php foreach ($statuspesanan as $inv) : ?>
                <?php endforeach; ?>
                <div class="row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <label>Nama Pembeli</label>
                    </div>
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        : <?= $inv->nama_pemesan ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <label>Email</label>
                    </div>
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        : <?= $inv->email ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <label>No. Handphone</label>
                    </div>
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        : <?= $inv->hp_pemesan ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <label>Alamat</label>
                    </div>
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        : <?= $inv->alamat ?>, <?= $inv->kota_pemesan ?> <?= $inv->kodepos ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <label>Tanggal Transaksi</label>
                    </div>
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        : <?= $inv->batas_bayar ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <label>Metode Bayar</label>
                    </div>
                    <div class="col-sm-8 mb-3 mb-sm-0">
                        : <?= $inv->metode_bayar ?> <?= $inv->mitra_bayar ?> <?= $inv->rekening ?> A/N <?= $inv->pemilik ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardPesanan" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-luggage-cart"></i> Data Pesanan </h6>
        </a>
        <div class="collapse show" id="collapseCardPesanan">
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
                            foreach ($statuspesanan as $psn) :
                                $subtotal = $psn->jumlah * $psn->harga;
                                $total += $subtotal;
                            ?>
                                <tr>
                                    <td align="center"><?= $psn->id_barang ?></td>
                                    <td align="center"><?= $psn->nama_barang ?></td>
                                    <td align="center"><?= $psn->jumlah ?></td>
                                    <td align="right">Rp. <?= number_format($psn->harga, 0, ',', '.') ?></td>
                                    <td align="right"><strong>Rp. <?= number_format($subtotal, 0, ',', '.') ?></strong></td>
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
    <div class="modal-footer ml-auto">
        <a href="<?= base_url('toko/invoice/index') ?>">
            <div class="btn btn-sm btn-secondary">Kembali</div>
        </a>
    </div>
</div>

<!-- Modal status pembayaran -->
<div class="modal fade" id="statusbayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" style="width: 550px">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 550px">
            <div class="modal-content" style="width: 550px">
                <?php foreach ($statuspesanan as $p) : ?>
                <?php endforeach; ?>
                <div class="modal-header" style="width: 550px">
                    <h5 class="modal-title" id="exampleModalLongTitle">Status Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-5 mb-3 mb-sm-0">
                            Status Pembayaran <?= $p->id_invoice ?>
                        </div>
                        <div class="h5 col-md-6">
                            <strong>
                                <?php
                                if ($p->status_bayar == "SUKSES" and $p->foto_bukti != "0") {
                                ?>
                                    <span class="badge badge-success mb-1">
                                        <label class="form-check-label">
                                            <?php
                                            echo "Pembayaran Sukses" ?>
                                        </label>
                                    </span>
                                <?php
                                } else if ($p->status_bayar == "GAGAL" and $p->foto_bukti != "0") {
                                ?>
                                    <span class="badge badge-danger mb-1">
                                        <label class="form-check-label">
                                            <?php
                                            echo "Pembayaran Gagal" ?>
                                        </label>
                                    </span>
                                <?php
                                } else {
                                ?>
                                    <span class="badge badge-info mb-1">
                                        <label class="form-check-label">
                                            <?php
                                            echo "Bukti telah dikirim" ?>
                                        </label>
                                    </span>
                                <?php
                                }
                                ?>
                            </strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5 mb-3 mb-sm-0 ">
                            Transfer via Bank
                        </div>
                        <div class="col-md-6">
                            : <?= $p->mitra_bayar ?> <?= $p->rekening ?> <br> : <?= $p->pemilik ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5 mb-3 mb-sm-0 ">
                            Waktu Pembayaran
                        </div>
                        <div class="col-md-6">
                            : <?= $p->batas_bayar ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5 mb-3 mb-sm-0 ">
                            Bukti Pembayaran
                        </div>
                        <div class="col-md-6">
                            <img src="<?= base_url() . '/uploads/buktipembayaran/' . $p->foto_bukti ?>" width="270 px" style="border:2px ridge #0404B4;">
                        </div>
                    </div>
                    <form action="<?= base_url() . 'toko/invoice/update_bukti_bayar'; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-md-5 mb-3 mb-sm-0">
                                Konfirmasi Pembayaran
                            </div>
                            <div class="col-md-6">
                                <select name="status_bayar" id="status_bayar" class="form-control" style="width: 270px">
                                    <option value="0">Pilih Status</option>
                                    <option value="SUKSES">Sukses</option>
                                    <option value="GAGAL">Gagal</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="id_invoice" name="id_invoice" value="<?= $p->id_invoice ?>">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Update Status Pembayaran</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal prosespesanan -->
<div class="modal fade" id="prosespesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" style="width: 550px">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 550px">
            <div class="modal-content" style="width: 550px">
                <?php foreach ($statuspesanan as $p) : ?>
                <?php endforeach; ?>
                <div class="modal-header" style="width: 550px">
                    <h5 class="modal-title" id="exampleModalLongTitle">Proses Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-5 mb-3 mb-sm-0">
                            Status Pesanan
                        </div>
                        <div class="h5 col-md-6">
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
                                    <span class="badge badge-info mb-1">
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
                    <?php
                    if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikemas") {
                    ?>
                        <form action="<?= base_url() . 'toko/invoice/update_prosespesanan'; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-md-5 mb-3 mb-sm-0">
                                    Proses Pesanan
                                </div>
                                <div class="col-md-6">
                                    <select name="proses_pesanan" id="proses_pesanan" class="form-control" style="width: 270px">
                                        <option value="Dikemas">Dikemas</option>
                                        <option value="Dikirim Penjual">Dikirim Penjual</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="id_invoice" name="id_invoice" value="<?= $p->id_invoice ?>">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Update Proses Pesanan</button>
                            </div>
                        </form>
                    <?php
                    } else if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikirim Penjual") {
                    ?><span class="badge badge-success mb-1">
                            <label class="form-check-label">
                                <?php
                                echo "Dikirim Penjual" ?>
                            </label>
                        </span>
                    <?php
                    } else if ($p->status_bayar == "SUKSES") {
                    ?><form action="<?= base_url() . 'toko/invoice/update_prosespesanan'; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-md-5 mb-3 mb-sm-0">
                                    Proses Pesanan
                                </div>
                                <div class="col-md-6">
                                    <select name="proses_pesanan" id="proses_pesanan" class="form-control" style="width: 270px">
                                        <option value="0">Pilih Status</option>
                                        <option value="Dikemas">Dikemas</option>
                                        <option value="Dikirim Penjual">Dikirim Penjual</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="id_invoice" name="id_invoice" value="<?= $p->id_invoice ?>">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Update Proses Pesanan</button>
                            </div>
                        </form>
                    <?php
                    }  ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal resipengiriman -->
<div class="modal fade" id="resipengiriman" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" style="width: 550px">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 550px">
            <div class="modal-content" style="width: 550px">
                <?php foreach ($statuspesanan as $p) : ?>
                <?php endforeach; ?>
                <div class="modal-header" style="width: 550px">
                    <h5 class="modal-title" id="exampleModalLongTitle">Resi Pengiriman <?= $p->nama_armada ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-5 mb-3 mb-sm-0">
                            Status Resi Pengiriman
                        </div>
                        <div class="h5 col-md-6">
                            <strong>
                                <?php
                                if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikirim Penjual" and $p->resi_kurir != 0) {
                                ?>
                                    <span class="badge badge-info mb-1">
                                        <label class="form-check-label">
                                            <?php
                                            echo "Telah di Input" ?>
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
                                } else if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikemas") {
                                ?>
                                    <span class="badge badge-warning mb-1">
                                        <label class="form-check-label">
                                            <?php
                                            echo "Pending" ?>
                                        </label>
                                    </span>
                                <?php
                                } else if ($p->status_bayar == "GAGAL" and $p->status_pesanan == "Pesanan Ditolak") {
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
                    <?php
                    if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikirim Penjual" and $p->resi_kurir != "0") {
                    ?>
                        <form action="<?= base_url() . 'toko/invoice/update_resi'; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-md-5 mb-3 mb-sm-0">
                                    Resi Pengiriman
                                </div>
                                <div class="col-md-6">
                                    <input type="text" value="<?= $p->resi_kurir ?>" name="resi_pengiriman" class="form-control" aria-label="resi_pengiriman" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="id_invoice" name="id_invoice" value="<?= $p->id_invoice ?>">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Update Resi Pengiriman</button>
                            </div>
                        </form>
                    <?php
                    } else if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikirim Penjual") {
                    ?>
                        <form action="<?= base_url() . 'toko/invoice/update_resi'; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-md-5 mb-3 mb-sm-0">
                                    Resi Pengiriman
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="resi_pengiriman" class="form-control" aria-label="resi_pengiriman" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="id_invoice" name="id_invoice" value="<?= $p->id_invoice ?>">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Input Resi Pengiriman</button>
                            </div>
                        </form>
                    <?php
                    } else if ($p->status_bayar == "SUKSES" and $p->status_pesanan == "Dikemas") {
                    ?>
                        <div class="form-group row">
                            <div class="col-md-5 mb-3 mb-sm-0">
                                Resi Pengiriman
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="resi_pengiriman" class="form-control" aria-label="resi_pengiriman" aria-describedby="addon-wrapping" readonly>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="id_invoice" name="id_invoice" value="<?= $p->id_invoice ?>">
                        <div class="modal-footer">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">Pending</span>
                            </button>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="form-group row">
                            <div class="col-md-5 mb-3 mb-sm-0">
                                Resi Pengiriman
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="resi_pengiriman" class="form-control" aria-label="resi_pengiriman" aria-describedby="addon-wrapping" readonly>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="id_invoice" name="id_invoice" value="<?= $p->id_invoice ?>">
                        <div class="modal-footer">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">Tidak Dapat di Proses</span>
                            </button>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>