<div class="container-fluid">

    <div class="row">
        <div class="col-xl-9 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- Card Body -->
                <div class="card-body">
                    <?php foreach ($barang as $brg) : ?>
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url() . '/uploads/barang/' . $brg->foto_barang ?>" height="303 px" width="270 px" style="border:2px ridge #0404B4;">
                            </div>

                            <div class=" col-md-8">
                                <table class="table" border="0">
                                    <td>
                                        <strong>
                                            <h4 class="font-weight-bold text-primary"><?= $brg->nama_barang ?></h4>
                                        </strong>
                                    </td>
                                    <tr>
                                        <td><label><?= $brg->keterangan ?></label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>
                                                <strong>
                                                    <?php
                                                    $harga = 0;
                                                    if ($brg->diskon != 0) {
                                                    ?>

                                                        <span class="badge badge-info mb-1">
                                                            <?php
                                                            $harga = $brg->harga_barang - (($brg->diskon / 100) * $brg->harga_barang);
                                                            echo "Rp. " . number_format($harga, 0, ',', '.'); ?> </span>

                                                        <span class="badge badge-danger mb-1">
                                                            <?php
                                                            echo "<strike> <small> Rp. " . number_format($brg->harga_barang, 0, ',', '.') . "</small></strike>" . "<br>";
                                                            ?> </span>
                                                    <?php
                                                    } else {
                                                    ?> <span class="badge badge-info mb-1"> <?php
                                                                                            echo "Rp. " . number_format($brg->harga_barang, 0, ',', '.'); ?> </span> <?php
                                                                                                                                                                    }
                                                                                                                                                                        ?>
                                                </strong></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Stok Produk : <?= $brg->stok_barang ?></label></td>
                                    </tr>
                                    <tr>
                                        <td> <?php echo anchor('marketplace/addcart/' . $brg->id_barang, ' <div class="btn btn-sm btn-outline-primary">Tambah ke Keranjang
                   </div>') ?>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="card-header font-weight-bold text-primary"> Deskripsi Produk </div>
                    <?php foreach ($barang as $brg) : ?>
                        <div class="row no-gutters">
                            <div class="col-md-9">
                                <p>
                                    <?= $brg->deskripsi_barang ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-3 col-lg-4 text-center">
            <div class="card shadow mb-4 text-center">
                <!-- Card Header - Dropdown -->
                <center>
                    <div class="card-header py-3 d-flex flex-row align-items-center text-center">
                        <h6 class="m-0 font-weight-bold text-primary text-center">Dijual Oleh</br></h6>
                    </div>
                </center>
                <!-- Card Body -->
                <div class="card-body">
                    <div align="center">
                        <?php foreach ($barang as $brg) : ?>
                            <img src="<?= base_url() . '/assets/img/profile/' . $brg->foto_toko ?>" width="200 px" style="border:2px ridge #0404B4;" class="mb-3"><br>
                            <label><a href="<?= base_url('marketplace/toko/' . $brg->nama_toko) ?>" class="text-secondary" style="text-decoration: none">
                                    <i class="fas fa-store mr-2"></i> <?= $brg->nama_toko  ?></a></label><br>
                            <label><i class="fas fa-map-marker-alt"></i> <?= $brg->kota_toko ?></label>
                            <?php echo anchor('marketplace/toko/' . $brg->id_toko, '<div class="btn btn-sm btn-primary" style="width: 200px;">Kunjungi Toko</div>') ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="card shadow mt-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jasa Pengiriman</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td><strong>Kurir</strong></td>
                                <td><strong>Layanan</strong></td>
                            </tr>
                            <?php foreach ($armada as $a) : ?>

                                <tr>
                                    <td><?= $a->nama_armada ?></td>
                                    <td><?= $a->layanan ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>