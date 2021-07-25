<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner fa-fw ml-1">
            <div class="carousel-item active ml-5">
                <img class="d-block w-100%" src="<?= base_url('assets/img/1.png') ?>" alt="First slide">
            </div>
            <div class="carousel-item ml-5">
                <img class="d-block w-100%" src="<?= base_url('assets/img/2.png') ?>" alt="First slide">
            </div>
            <div class="carousel-item ml-5">
                <img class="d-block w-100%" src="<?= base_url('assets/img/3.png') ?>" alt="First slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="card mt-4 shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                <label>Produk Promo</label>

            </h6>
        </div>
    </div>
    <div class="row text-center mt-3 mb-3 ml-5 mr-5 responsive">
        <?php foreach ($barang as $brg) : ?>
            <div class="card ml-2 mb-3 text-center" style="width: 13rem; height:21rem;">
                <center><img class="card-img-center" style="width:170px; height:170px;" src="<?= base_url() . '/uploads/barang/' . $brg->foto_barang ?>" alt="Card image cap"></center>
                <h5 class="card-header modal-title font-weight-bold text-primary"><a href="<?= base_url('marketplace/detail/' . $brg->id_barang) ?>" style="text-decoration: none">
                        <?php $namatoko = $brg->nama_barang;
                        $sub = substr($namatoko, 0, 13); ?>
                        <?= $sub ?>..</a></h5>
                <div class="card-body">
                    <h5>
                        <strong>
                            <?php
                            if ($brg->diskon != 0) {
                            ?>

                                <span class="badge badge-info mb-2">
                                    <?php
                                    echo "Rp. " . number_format($brg->harga_setelahdiskon, 0, ',', '.'); ?> </span>

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
    <div class="card mt-4 shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                <label>Produk Lainnya</label>
            </h6>
        </div>
    </div>
    <div class="row text-center mt-3 mb-3 ml-5 mr-5 responsive">
        <?php foreach ($barang2 as $brg) : ?>
            <div class="card ml-2 mb-3 text-center" style="width: 13rem; height:21rem;">
                <center><img class="card-img-center" style="width:170px; height:170px;" src="<?= base_url() . '/uploads/barang/' . $brg->foto_barang ?>" alt="Card image cap"></center>
                <h5 class="card-header modal-title font-weight-bold text-primary"><a href="<?= base_url('marketplace/detail/' . $brg->id_barang) ?>" style="text-decoration: none"><?php $namatoko = $brg->nama_barang;
                                                                                                                                                                                    $sub = substr($namatoko, 0, 13); ?>
                        <?= $sub ?>..</a></h5></a></h5>
                <div class="card-body">
                    <h5>
                        <strong>
                            <?php
                            $harga = 0;
                            if ($brg->diskon != 0) {
                            ?>

                                <span class="badge badge-info mb-2">
                                    <?php
                                    echo "Rp. " . number_format($brg->harga_setelahdiskon, 0, ',', '.'); ?> </span>

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