<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <hr>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Semua Barang</div>
                            <?php foreach ($databarang as $d) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $d['total']; ?></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Toko</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->db->count_all('toko'); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-store fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pesanan</div>
                            <?php foreach ($order as $o) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $o['total']; ?></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-luggage-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Ringkasan Pendapatan Toko
            </h6>
        </div>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <?php foreach ($report as $r) : ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1 mt-1">Pendapatan
                                    <?php $namatoko = $r['nama_toko'];
                                    $sub = substr($namatoko, 0, 9); ?>
                                    <?= $sub ?>..
                                    <br> Bulan Ke <?= date('m-Y'); ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($r['penghasilan'], 0, ',', '.') ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>