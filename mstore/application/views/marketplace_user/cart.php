<div class="container-fluid">
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr align="center">
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php foreach ($this->cart->contents() as $items) : ?>
                                        <tr>
                                            <td align="center"><img src="<?= base_url() . '/uploads/barang/' . $items['foto_barang'] ?>" height="100 px" width="100 px" style="border:2px ridge #0404B4;"></td>
                                            <td>
                                                <a href="<?= base_url('marketplace/detail/' . $items['id']) ?>" style="text-decoration: none">
                                                    <h6 class="m-0 font-weight-bold text-primary"><?= $items['name'] ?></h6>
                                                </a><br>
                                                <p>
                                                    <a href="<?= base_url('marketplace/toko/' . $items['id_toko']) ?>" class="text-secondary" style="text-decoration: none">
                                                        <i class="fas fa-store mr-2"></i> <?= $items['nama_toko'] ?></a>
                                                </p>
                                            </td>
                                            <td align="center">
                                                <?= form_open('marketplace/update_itemcart'); ?>
                                                <input type="hidden" name="item-rowid" value="<?= $items['rowid']; ?>" />
                                                <input type="number" name="item-qty" id="item-qty" min="0" max="20" style="text-align: center" value="<?= $items['qty']  ?>" />
                                                <button type="submit" class="btn btn-secondary btn-sm">set</button>
                                                <?= form_close(); ?>
                                            </td>
                                            <td align="center">
                                                Rp. <?= number_format($items['price'], 0, ',', '.') ?>
                                            </td>
                                            <td> <strong>Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></strong></td>
                                            <td align="center"> <?= form_open('marketplace/delete_itemcart'); ?>
                                                <input type="hidden" name="item-rowid" value="<?= $items['rowid']; ?>" />
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash" ?></i></button>
                                                <?= form_close(); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ringkasan Belanja</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col sm-2 mt-2 ml-1 text-center">
                            <h4 class="font-weight-bold">Total Belanja : Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></h4>
                        </div>
                    </div>
                    <div align="center">
                        <a href="<?= base_url('marketplace/konfirmasi') ?>" class="btn btn-sm btn-success" style="width: 100%; text-decoration: none" onclick="return confirm('Pastikan pesanan anda benar, jika ada perubahan jumlah pesanan harap di lakukan update barang sekarang. Pada proses checkot barang yang dipesan tidak dapat dirubah. Pilih Oke untuk melanjutkan Checkout! ');">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>