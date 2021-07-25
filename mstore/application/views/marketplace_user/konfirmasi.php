<div class="container-fluid">
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">

                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"></i>Checkout</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="post" action="<?= base_url('marketplace/detail_invoice') ?> ">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-address-book"></i> Alamat Pengiriman </h6>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Nama Penerima
                                        <input type="text" name="nama_pemesan" class="form-control " id="exampleFirstName" placeholder="Nama Penerima">
                                        <?= form_error('nama_pemesan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        Email
                                        <input type="text" name="email" class="form-control " id="email" placeholder="Alamat Email">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        Kota/Kabupaten
                                        <input type="text" name="kota_pemesan" class="form-control " id="exampleFirstName" placeholder="Kota">
                                        <?= form_error('kota_pemesan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        Kodepos
                                        <input type="text" name="kodepos" class="form-control " id="exampleLastName" placeholder="Kodepos">
                                        <?= form_error('kodepos', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    No. Handphone
                                    <input type="text" name="hp_pemesan" class="form-control " id="exampleLastName" placeholder="No. Handphone">
                                    <?= form_error('hp_pemesan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    Alamat
                                    <textarea class="form-control" name="alamat" cols="3"> </textarea>
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <?php foreach ($this->cart->contents() as $items) : ?>
                                    <?php endforeach; ?>
                                    <input type="hidden" class="form-control" id="id_toko" name="id_toko" value="<?= $items['id_toko']; ?>">
                                    <?= form_error('id_toko', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <input type="hidden" class="form-control" id="toko_area" name="toko_area" value="<?= $items['kodearea']; ?>">
                                    <?= form_error('toko_area', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
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
                                            <td width="250px">
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
                                            <td> <strong>Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></strong></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr colspan="5">
                                        <td><label>Jasa Pengiriman</label></td>
                                        <td colspan="4">
                                            <select name="armada" id="armada" class="form-control">
                                                <option value="">Pilih Kurir Pengiriman</option>
                                                <?php foreach ($armada as $a) : ?>
                                                    <option value="<?= $a['id']; ?>"><?= $a['nama_armada']; ?> <?= $a['layanan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Metode Pembayaran</label></td>
                                        <td colspan="4"><select name="bayar" id="bayar" class="form-control">
                                                <option value="">Pilih Metode Bayar</option>
                                                <?php foreach ($bayar as $b) : ?>
                                                    <option value="<?= $b['id']; ?>"><?= $b['metode_bayar']; ?> <?= $b['mitra_bayar']; ?></option>
                                                <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="idtoko" value="<?= $items['id_toko']; ?>" />
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Checkout
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                    <div class="form-group row">
                        <div class="col sm-2 ml-1">
                            <center>
                                <h6 class="m-0 font-weight-bold text-danger">Belum Termasuk Ongkos Kirim</h6>
                            </center>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>