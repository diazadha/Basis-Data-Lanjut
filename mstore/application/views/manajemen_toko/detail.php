<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                <label>Detail Barang</label>
            </h6>
        </div>
    </div>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <!-- Card Body -->
        <div class="card-body">
            <?php foreach ($barang as $brg) : ?>
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="<?= base_url() . '/uploads/barang/' . $brg->foto_barang ?>" height="303 px" width="270 px" style="border:2px ridge #0404B4;">
                    </div>
                    <div class="col-md-8 ml-5">
                        <table class="table" border="0">
                            <td>
                                <div class=" col-9">
                                    <strong>
                                        <h4 class="font-weight-bold text-primary"><?= $brg->nama_barang ?></h4>
                                    </strong></div>
                            </td>
                            <div class=" col-5">
                                <tr>

                                    <td><small><?= $brg->keterangan ?></small></td>

                                </tr>
                            </div>
                            <tr></tr>
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
                                <td>Stok Produk : <?= $brg->stok_barang ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <div class="card-header font-weight-bold text-primary">Deskripsi Produk </div>
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
    <div class="modal-footer ml-auto">
        <a href="<?= base_url('toko/databarang/index') ?>">
            <div class="btn btn-sm btn-secondary">Kembali</div>
        </a>
    </div>
</div>