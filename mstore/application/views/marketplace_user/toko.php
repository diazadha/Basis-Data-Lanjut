<div class="container-fluid">

    <div class="card shadow">
        <!-- Card Header - Dropdown -->
        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="col-xl-2 col-lg-4">
                    <?php foreach ($barang as $brg) : ?>
                    <?php endforeach; ?>
                    <img src="<?= base_url() . '/assets/img/profile/' . $brg->foto_toko ?>" height="75 px" width="200 px" style="border:2px ridge #0404B4;"><br>
                </div>
                <div class="col-md-5 ml-4">
                    <h3 class="m-0 font-weight-bold text-primary">
                        <?= $brg->nama_toko ?>
                    </h3>
                    <label><i class="fas fa-map-marker-alt mt-2"></i> <?= $brg->kota_toko ?>, <?= $brg->alamat_toko  ?> <?= $brg->kodepos_toko  ?></label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card shadow mt-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-hover" width="100%" cellspacing="0">
                        <tbody>
                            <?php foreach ($kategori as $k) : ?>
                                <tr>
                                    <td>
                                        <a href="<?= base_url('marketplace/kategori/' . $k->id) ?>" style="text-decoration: none"> <?= $k->nama_kategori ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-7">
            <div class="row text-center mt-3 mb-3 responsive">
                <?php foreach ($barang as $brg) : ?>
                    <div class="card ml-3 mb-3 text-center" style="width: 13rem; height:22rem;">
                        <center><img class="card-img-center" style="width:170px; height:170px;" src="<?= base_url() . '/uploads/barang/' . $brg->foto_barang ?>" alt="Card image cap"></center>
                        <h5 class="card-header modal-title font-weight-bold text-primary"><a href="<?= base_url('marketplace/detail/' . $brg->id_barang) ?>" style="text-decoration: none"> <?= $brg->nama_barang ?></a></h5>
                        <div class="card-body">
                            <h5>
                                <strong>
                                    <?php
                                    $harga = 0;
                                    if ($brg->diskon != 0) {
                                    ?>

                                        <span class="badge badge-info mb-2">
                                            <?php
                                            $harga = $brg->harga_barang - (($brg->diskon / 100) * $brg->harga_barang);
                                            echo "Rp. " . number_format($harga, 0, ',', '.'); ?> </span>

                                        <span class="badge badge-danger mb-2">
                                            <?php
                                            echo "<strike> <small> Rp. " . number_format($brg->harga_barang, 0, ',', '.') . "</small></strike>" . "<br>";
                                            ?> </span>
                                    <?php
                                    } else {
                                    ?> <span class="badge badge-info mb-2"> <?php
                                                                            echo "Rp. " . number_format($brg->harga_barang, 0, ',', '.'); ?> </span> <?php
                                                                                                                                                    }
                                                                                                                                                        ?>
                                </strong>
                            </h5>
                            <?php echo anchor('marketplace/addcart/' . $brg->id_barang, ' <div class="btn btn-sm btn-outline-primary">Tambah ke Keranjang
                </div>') ?>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>