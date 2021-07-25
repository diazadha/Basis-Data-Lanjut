<div class="container-fluid">
    <center>
        <div style="width: 800px">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardbatas" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <font align="left">
                        <h6 class="m-0 font-weight-bold text-primary">Pembayaran via Transfer Bank </h6>
                    </font>
                </a>
                <div class="collapse show" id="collapseCardbatas">
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="card-body">
                                <center>
                                    <h6 class="m-0 font-weight-bold text-primary"></i> Batas Pembayaran : <?= $kodeinvoice->batas_bayar ?> </h6><br>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>
                                                <h6>Jumlah Tagihan :</h6>
                                            </label><br>
                                            <h4 class="m-0 font-weight-bold text-secondary">Rp.<?= number_format($kodeinvoice->tagihan, 0, ',', '.') ?></h4><br>

                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>
                                                <h6>Transfer Bank :</h6>
                                            </label><br>
                                            <h4 class="m-0 font-weight-bold text-secondary"><?= $kodeinvoice->pemilik ?><br><?= $kodeinvoice->mitra_bayar ?> <?= $kodeinvoice->rekening ?></h4><br>

                                        </div>
                                    </div>
                                    <label>
                                        <h6>Nomor Tagihan Invoice : </h6>
                                    </label><br>
                                    <h4 class="m-0 font-weight-bold text-secondary"><?= $kodeinvoice->id_invoice ?></h4><br>
                                    <label><small><i>**Catat Nomor Tagihan untuk Cek Status Pesanan</i></small></label>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardAlamat" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <font align="left">
                        <h6 class="m-0 font-weight-bold text-primary">Upload Bukti Pembayaran </h6>
                    </font>
                </a>
                <div class="collapse show" id="collapseCardAlamat">
                    <div class="card-body">
                        <div class="card-body">
                            <center>
                                <div id="uploaded_image">
                                </div>
                                <label><small><i>**Pastikan Foto Bukti Pembayaran jelas dan terbaca</i></small></label>
                            </center><br><br>
                            <form method="post" id="upload_form" align="center" enctype="multipart/form-data">
                                <input type="file" name="image_file" id="image_file" /> <input type="submit" name="upload" id="upload" value="Upload Gambar" class="btn btn-secondary btn-sm" />
                                <br />
                                <br />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url('marketplace/index') ?>">
                                <div class="btn btn-sm btn-warning" onclick="return confirm('Pastikan kode Nomor Tagihan Invoice : <?= $kodeinvoice->id_invoice ?>, telah dicatat! ');">Upload Nanti</div>
                            </a>
                            <?= anchor('marketplace/update_bukti/' . $kodeinvoice->id_invoice, '<div class="btn btn-success btn-sm">Konfirmasi Pembayaran</div>') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</center>
</div>