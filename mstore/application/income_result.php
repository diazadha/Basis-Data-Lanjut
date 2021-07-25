<div class="container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/index') ?>">Semua Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('sistemreport/report/income') ?>">Performa Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/income_kategori') ?>">Pendapatan Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/favourite') ?>">Produk Terfavorit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/customer') ?>">Pelanggan Teraktif</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="card shadow mb-4">
                <div class="card-body text-right">
                    <form method="post" action="<?= base_url('sistemreport/report/proses_income') ?> ">
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0 text-left">
                                <label>Dari </label>
                                <input type="date" name="dari" id="dari" class="form-control" placeholder="Format Y-m-d H:i:s">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0 text-left">
                                <label>Sampai</label>
                                <div class="input-group mb-3">
                                    <input type="date" name="sampai" id="sampai" class="form-control" placeholder="Format Y-m-d H:i:s">
                                </div>
                            </div>
                            <div class="col-xl-3 mb-3 mb-sm-0 text-left">
                                <label>Aksi</label> <br>
                                <button type="submit" class="btn btn-primary btn-md" aria-haspopup="true" aria-expanded="false" style="width: 100%">
                                    Tampilkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h5 class="m-0 font-weight-bold text-primary text-left ">Hasil Sorting : </h5>
            <h6 class="m-0 font-weight-bold text-secondary text-left mb-3">
            </h6>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Grafik</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="container">
                        <h6 class="m-0 font-weight-bold text-primary text-middle ">Performa Toko (per tahun per bulan)</h6>
                        <br>
                        <h6 class="m-0 font-weight-bold text-primary text-left mb-3">Penghasilan</h6>
                        <canvas id="myChart"></canvas>
                        <h6 class="m-0 font-weight-bold text-primary text-right mb-3">Nama Toko</h6>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Performa Toko</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Penghasilan</th>
                                    <th scope="col">Nama Toko</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $total = 0;
                                foreach ($hasil as $r) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td align="center"><?= $r->tahun ?></td>
                                        <td align="center"><?= $r->bulan ?></td>
                                        <td align="center">Rp. <?= number_format($r->penghasilan, 0, ',', '.') ?></td>
                                        <?php $namatoko = $r->nama_toko;
                                        $sub = substr($namatoko, 0, 13); ?>
                                        <td align="center"><?= $sub ?>..</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="mt-2 card-footer py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                if (count($hasil) > 0) {
                    foreach ($hasil as $data) {
                        echo "'" . $data->nama_toko . "(" . $data->tahun . "-" . $data->bulan . ")" . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                label: 'Jumlah Penghasilan (Rp) ',
                backgroundColor: '#ADD8E6',
                borderColor: '##93C3D2',
                data: [
                    <?php
                    if (count($hasil) > 0) {
                        foreach ($hasil as $data) {
                            echo $data->penghasilan . ", ";
                        }
                    }
                    ?>
                ]
            }]
        },
    });
</script>