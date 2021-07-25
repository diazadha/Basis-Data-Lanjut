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
    <h4 class="m-0 font-weight-bold text-primary text-center mt-5">
        <hr><label>Rekomendasi Lokasi Terdekat</label>
        <hr>
    </h4>

    <div class="row text-center mt-5 mb-3  responsive">
        <?php foreach ($dekat as $tk) : ?>
            <div class="card ml-3 mb-3 text-center" style="width: 18rem; height:22rem;">
                <center>
                    <img class="card-img-center" style="width:280px; height:150px;" src="<?= base_url() . '/assets/img/profile/' . $tk->foto_toko ?>" style="border:2px ridge #0404B4;">
                </center>
                <h5 class="card-header modal-title font-weight-bold text-primary">
                    <a href="<?= base_url('marketplace/toko/' . $tk->id) ?>" style="text-decoration: none"><?= $tk->nama_toko ?></a></h5>
                <div class="card-body">
                    <label><i class="fas fa-map-marker-alt"></i> <?= $tk->kota_toko ?></label>
                    </br><label><small><?= $tk->alamat_toko ?>,<?= $tk->kodepos_toko  ?></small></label>
                    <!-- <?php echo anchor('marketplace/addcart/' . $tk->id_barang, ' <div class="btn btn-sm btn-outline-primary">Add to Cart
                </div>') ?>
                    <?php echo anchor('marketplace/detail/' . $tk->id_barang, ' <div class="btn btn-sm btn-outline-success">Detail
                </div>') ?> -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h4 class="m-0 font-weight-bold text-primary text-center mt-5">
        <hr><label>Semua Brand Toko</label>
        <hr>
    </h4>
    <div class="row text-center mt-5 mb-3  responsive">
        <?php foreach ($jauh as $tk) : ?>
            <div class="card ml-3 mb-3 text-center" style="width: 18rem; height:22rem;">
                <center>
                    <img class="card-img-center" style="width:280px; height:150px;" src="<?= base_url() . '/assets/img/profile/' . $tk->foto_toko ?>" style="border:2px ridge #0404B4;">
                </center>
                <h5 class="card-header modal-title font-weight-bold text-primary">
                    <a href="<?= base_url('marketplace/toko/' . $tk->id) ?>" style="text-decoration: none"><?= $tk->nama_toko ?></a></h5>
                <div class="card-body">
                    <label><i class="fas fa-map-marker-alt"></i> <?= $tk->kota_toko ?></label>
                    </br><label><small><?= $tk->alamat_toko ?>,<?= $tk->kodepos_toko  ?></small></label>
                    <!-- <?php echo anchor('marketplace/addcart/' . $tk->id_barang, ' <div class="btn btn-sm btn-outline-primary">Add to Cart
                </div>') ?>
                    <?php echo anchor('marketplace/detail/' . $tk->id_barang, ' <div class="btn btn-sm btn-outline-success">Detail
                </div>') ?> -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>