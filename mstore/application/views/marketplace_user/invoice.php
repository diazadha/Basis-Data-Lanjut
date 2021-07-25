<div class="container-fluid">
    <center>
        <div class="card text-left shadow" style="width: 800px">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-shopping-cart mr-2"></i>INVOICE</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="post" action="<?= base_url('marketplace/proses_pesanan') ?> ">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-address-book"></i> Alamat Pengiriman </h6>
                            <hr>

                            <?= $this->session->userdata('nama_pemesan'); ?> <br>
                            <?= $this->session->userdata('email'); ?><br>
                            <?= $this->session->userdata('alamat'); ?>
                            <?= $this->session->userdata('kota_pemesan'); ?> <br>
                            <?= $this->session->userdata('kodepos'); ?> <br>
                            <?= $this->session->userdata('hp_pemesan'); ?>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="m-0 font-weight-bold text-primary"><label>Order Date : </label> <?= $this->session->userdata('order_date'); ?></h6> <br>
                            <input type="hidden" name="order_date" value="<?= $this->session->userdata('order_date'); ?>" />
                            <table class="table table-hover">
                                <tr align="center">
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <tr>
                                        <td align="center"><img src="<?= base_url() . '/uploads/barang/' . $items['foto_barang'] ?>" height="100 px" width="100 px" style="border:2px ridge #0404B4;"></td>
                                        <td>
                                            <h6 class="m-0 font-weight-bold text-primary"><?= $items['name'] ?></h6><br>
                                            <p>
                                                <i class="fas fa-store mr-2"></i> <?= $items['nama_toko']; ?>
                                            </p>
                                        </td>
                                        <td align="center">
                                            <?= $items['qty'] ?> Item
                                        </td>
                                        <td align="center">
                                            Rp. <?= number_format($items['price'], 0, ',', '.') ?>
                                        </td>
                                        <td align="right"> <strong>Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></strong></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr colspan="5">
                                    <td colspan="4" align="right"><label>Total Belanja</label></td>
                                    <td align="right">
                                        <strong>Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></strong>
                                    </td>
                                </tr>
                                <tr colspan="5">
                                    <?php foreach ($ongkirlayanan as $l) : ?><?php endforeach; ?>
                                    <?php foreach ($ongkirwilayah as $k) : ?>
                                        <td colspan="4" align="right"><label>Pengiriman <?= $l['nama_armada'] ?> <?= $l['layanan'] ?> </label></td>
                                        <td align="right">
                                            <strong>Rp. <?= number_format($shipping = $k['delivfee'] + $l['harga_layanan'], 0, ',', '.') ?></strong>
                                            <input type="hidden" name="ongkir" value="<?= $shipping; ?>" />
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right"><label>Grand Total</label></td>
                                    <td align="right">
                                        <strong>Rp. <?= number_format($shipping + $this->cart->total(), 0, ',', '.') ?></strong>
                                    </td>
                                </tr>

                                <input type="hidden" name="idtoko" value="<?= $items['id_toko']; ?>" />
                                <input type="hidden" name="bayar" value="<?= $this->session->userdata('bayar'); ?>" />
                                <input type="hidden" name="armada" value="<?= $this->session->userdata('id_armada'); ?>" />

                            </table>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="font-weight-bold text-primary"><label>Lakukan pembayaran sebelum : </label> <?= $this->session->userdata('batas_bayar'); ?></h6>
                            <input type="hidden" name="batas_bayar" value="<?= $this->session->userdata('batas_bayar'); ?>" />
                            <hr>
                            <h3 class="m-0 font-weight-bold text-secondary"> <label> Total Tagihan : Rp. <?= number_format($shipping + $this->cart->total(), 0, ',', '.') ?></label></h3>
                            <input type="hidden" name="total_tagihan" value="<?= $shipping + $this->cart->total() ?>" />
                            <div class="form-group row">
                                <?php foreach ($bayar as $b) : ?>
                                    <div class="col-sm-4 mb-3 mb-sm-0 text-left">
                                        <?= $b['metode_bayar'] . " Bank"; ?> <br>
                                        <?= $b['mitra_bayar']; ?>
                                        <?= $b['rekening']; ?><br>
                                        <?= $b['pemilik']; ?><br>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Bayar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </center>
</div>