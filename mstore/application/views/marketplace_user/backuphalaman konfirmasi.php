<div class="container-fluid">
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-shopping-cart mr-2"></i>Summary</h6>
                </div>
                <!-- Card Body -->

                <div class="card-body">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form method="post" action="<?= base_url('marketplace/proses_pesanan') ?> ">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-address-book"></i> Shipping Address </h6><br>
                                <?= $this->session->userdata('nama_pemesan'); ?>
                                <?= $this->session->userdata('email'); ?><br>
                                <?= $this->session->userdata('alamat'); ?>
                                <?= $this->session->userdata('kota_pemesan'); ?> <br>
                                <?= $this->session->userdata('kodepos'); ?> <br>
                                <?= $this->session->userdata('hp_pemesan'); ?>

                                <!-- <button type="submit" class="btn btn-primary btn-sm" aria-haspopup="true" aria-expanded="false">
                            Confirm
                        </button> -->
                            </form>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table table-hover">
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <input type="hidden" name="item-rowid" value="<?= $items['rowid']; ?>" />
                                    <tr>
                                        <td><img src="<?= base_url() . '/uploads/barang/' . $items['foto_barang'] ?>" height="100 px" width="100 px" style="border:2px ridge #0404B4;"></td>
                                        <td width="250px">
                                            <h6 class="m-0 font-weight-bold text-primary"><?= $items['name'] ?></h6><br>
                                            <p>
                                                <i class="fas fa-store mr-2"></i> <?= $items['nama_toko']; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <?= $items['qty'] ?> Item
                                        </td>
                                        <td> <strong>Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></strong></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr colspan="5">
                                    <td><label>Courier</label></td>
                                    <td width="250px">
                                        <form method="post" action="<?= base_url('marketplace/cekongkir') ?> ">
                                            <select name="id_kurir" id="id_kurir" class="form-control">
                                                <option value="">Select Courier</option>
                                                <?php foreach ($armada as $a) : ?>

                                                    <?php
                                                    $ket = "";
                                                    if (isset($this->input->post['id_kurir'])) {
                                                        if ($this->input->post['id_kurir'] = $a['id']) {
                                                            $ket = "selected";
                                                        }
                                                    }
                                                    ?>
                                                    <option <?= $ket; ?> value="<?= $a['id']; ?>"><?= $a['nama_armada']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-secondary btn-sm"> <i class="fas fa-truck fa-sm"></i> Cek</button>
                                        </form>
                                    </td>
                                    <td>
                                        <label><?php
                                                $grand_total = 0;
                                                // $harga_ongkir = 0;
                                                if ($keranjang = $this->cart->contents()) {
                                                    foreach ($ongkir as $o) {
                                                        $grand_total = $grand_total + $o['delivfee'];
                                                    }
                                                    if (!$harga_ongkir) {
                                                        $harga_ongkir['harga_layanan'] = 0;
                                                    }
                                                ?><strong> <?php echo "Rp. " . number_format($grand_total + $harga_ongkir['harga_layanan'], 0, ',', '.'); ?></strong>
                                            <?php $total = $grand_total + $harga_ongkir['harga_layanan'];
                                                } else {
                                                    echo "Keranjang masih kosong";
                                                } ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Payment Method</label></td>
                                    <td colspan="2"><select name="id_bayar" id="id_bayar" class="form-control">
                                            <option value="">Select Payment</option>
                                            <?php foreach ($bayar as $b) : ?>
                                                <option value="<?= $b['id']; ?>"><?= $b['mitra_bayar']; ?> <?= "|" ?> <?= $b['metode_bayar']; ?><?= " | No Rekening : " ?> <?= $b['rekening']; ?></option>
                                            <?php endforeach; ?>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Payment Details</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    $grand_total = 0;
                    if ($keranjang = $this->cart->contents()) {
                        foreach ($keranjang as $items) {
                            $grand_total = $grand_total + $items['subtotal'];
                        }
                    ?> <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Total Shopping</label></br>
                                <label>Shipping Costs</label></br>
                                <hr>
                                <label>Grand Total</label>
                            </div>
                            <div class="col-sm-6 text-right">
                                <label><?= "Rp." . number_format($grand_total, 0, ',', '.'); ?></label></br>
                                <label><?= "Rp." . number_format($total, 0, ',', '.'); ?></label></br>
                                <hr>
                                <label><?= "Rp." . number_format($grand_total + $total, 0, ',', '.'); ?></label></br>
                            </div>
                        </div>
                    <?php
                    } else {
                        echo "Keranjang masih kosong";
                    } ?>
                    <div class="form-group row mt-2 text-center">
                        <button class="prosespesanan btn btn-primary btn-sm" style="width: 100%" data-nama="<?= $this->session->userdata('nama_pemesan'); ?>" data-email="<?= $this->session->userdata('email'); ?>" data-alamat=" <?= $this->session->userdata('alamat'); ?>" data-kota=" <?= $this->session->userdata('kota_pemesan'); ?>" data-kodepos="<?= $this->session->userdata('kodepos'); ?> " data-hp="<?= $this->session->userdata('hp_pemesan'); ?>">
                            Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div> <!-- Pie Chart -->
    </div>
</div>