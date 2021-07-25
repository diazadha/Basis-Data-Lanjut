<div class="container-fluid">

    <div class="card shadow">
        <!-- Card Header - Dropdown -->
        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="col-xl-9 col-lg-5 ml-3 mr-4">
                    <?php foreach ($barang as $brg) : ?>
                    <?php endforeach; ?>
                    <h3 class="m-0 font-weight-bold text-primary">
                        All Catalog : <?= $brg->nama_kategori ?>
                    </h3>
                </div>
                <div class="col-xl-2 col-lg-5 ml-5">
                    <?= form_open("marketplace/kategorisemuatoko"); ?>
                    <div class="dropdown show">
                        <small>
                            <a class="btn btn-sm btn-secondary m-0 font-weight-bold dropdown-toggle" style="width:80%" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-fw fa-list"></i> Relevance
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                <a class="dropdown-item">Termurah</a>
                                <a class="dropdown-item">Termahal</a>
                                <a class="dropdown-item">Diskon</a>
                            </div>
                        </small>
                        <!-- href="<?= base_url('marketplace/relevance/' . $k->nama_kategori) ?>" -->
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card shadow mt-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-hover" width="100%" cellspacing="0">
                        <tbody>
                            <?php foreach ($kategorisemua as $k) : ?>
                                <tr>
                                    <td>
                                        <a href="<?= base_url('marketplace/kategorisemuatoko/' . $k->nama_kategori) ?>"> <?= $k->nama_kategori ?></a>
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
                        <h5 class="card-header modal-title font-weight-bold text-primary"><a href="<?= base_url('marketplace/detail/' . $brg->id_barang) ?>"> <?= $brg->nama_barang ?></a></h5>
                        <div class="card-body">
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
                                </strong>
                            </h5>
                            <?php echo anchor('marketplace/addcart/' . $brg->id_barang, ' <div class="btn btn-sm btn-outline-primary">Add to Cart
                </div>') ?>
                            <?php echo anchor('marketplace/detail/' . $brg->id_barang, ' <div class="btn btn-sm btn-outline-success">Detail
                </div>') ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>