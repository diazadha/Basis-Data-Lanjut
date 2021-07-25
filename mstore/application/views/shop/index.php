<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= base_url('assets/img/sample-1.jpg') ?>" alt="First slide">
            </div>
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= base_url('assets/img/sample-1.jpg') ?>" alt="First slide">
            </div>
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= base_url('assets/img/sample-1.jpg') ?>" alt="First slide">
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

    <div class="row text-center mt-3">
        <?php foreach ($barang as $brg) : ?>
            <div class="card ml-3" style="width: 16rem;">
                <img class="card-img-top" src="<?= base_url() . '/uploads/barang/' . $brg->foto_barang ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title mb-1"><small><?= $brg->nama_barang ?></small></h5>
                    <span class="badge badge-success mb-3">
                        <h6><small>Rp. <?= $brg->harga_barang ?> </small></h6>
                    </span><br>
                    <a href="#" class="btn btn-outline-primary" style="width:20">Beli</a>
                    <a href="#" class="btn btn-outline-success">Lihat Detail</a>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>