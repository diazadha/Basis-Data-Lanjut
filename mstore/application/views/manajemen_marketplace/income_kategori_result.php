<div class="container-fluid">
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/index') ?>">Semua Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sistemreport/report/income') ?>">Performa Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('sistemreport/report/income_kategori') ?>">Pendapatan Toko</a>
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
                    <form method="post" action="<?= base_url('sistemreport/report/proses_income_kategori') ?> ">
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
                                <label>Toko</label>
                                <div class="input-group mb-3">
                                    <select name="namatoko" id="namatoko" class="form-control" style="width: 100%">
                                        <?php foreach ($namatoko1 as $k) : ?>
                                            <option value="<?= $k->id ?>"><?= $k->nama_toko ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 mb-3 mb-sm-0 text-left">
                                <label>Kategori</label> <br>
                                <select name="kategori" id="kategori" class="form-control" style="width: 100%">

                                    <option value="">Pilih Kategori</option>

                                </select>
                                <button type="submit" class="btn btn-primary btn-md mt-3" aria-haspopup="true" aria-expanded="false" style="width: 100%">
                                    Tampilkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h5 class="m-0 font-weight-bold text-primary text-left ">Hasil Sorting : </h5>
            <h6 class="m-0 font-weight-bold text-secondary text-left mb-3">
                <?php foreach ($namatoko as $t) : ?><?= $t->nama_kategori ?> - <?= $t->nama_toko ?> <?php endforeach; ?> <br> Pada <?= $this->session->userdata('dari'); ?> s/d <?= $this->session->userdata('sampai'); ?>
            </h6>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Grafik</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="width: 100%">
                    <div class="container" style="width: 100%">
                        <h5 class="m-0 font-weight-bold text-primary text-middle ">Pendapatan Toko (per tahun per bulan)</h5>
                        <br>
                        <h6 class="m-0 font-weight-bold text-primary text-left mb-3"></i> Penghasilan</h6>
                        <canvas id="myChartKategori"></canvas>
                        <h6 class="m-0 font-weight-bold text-primary text-right mb-3"><i class="fas fa-arrow-right"></i> Tahun-Bulan</h6>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pendapatan Toko (per tahun per bulan)</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Bulan-Tahun</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Terjual</th>
                                    <th scope="col">Pendapatan</th>
                                    <th scope="col">Toko</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $total = 0;
                                foreach ($hasil as $r) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?php
                                            if ($r->Bulan != "0") {
                                                if ($r->Bulan == '1') {
                                                    $isBulan = 'Januari';
                                                } elseif ($r->Bulan == '2') {
                                                    $isBulan = 'Februari';
                                                } elseif ($r->Bulan == '3') {
                                                    $isBulan = 'Maret';
                                                } elseif ($r->Bulan == '4') {
                                                    $isBulan = 'April';
                                                } elseif ($r->Bulan == '5') {
                                                    $isBulan = 'Mei';
                                                } elseif ($r->Bulan == '6') {
                                                    $isBulan = 'Juni';
                                                } elseif ($r->Bulan == '7') {
                                                    $isBulan = 'Juli';
                                                } elseif ($r->Bulan == '8') {
                                                    $isBulan = 'Agustus';
                                                } elseif ($r->Bulan == '9') {
                                                    $isBulan = 'September';
                                                } elseif ($r->Bulan == '10') {
                                                    $isBulan = 'Oktober';
                                                } elseif ($r->Bulan == '11') {
                                                    $isBulan = 'Nopember';
                                                } elseif ($r->Bulan == '12') {
                                                    $isBulan = 'Desember';
                                                } elseif ($r->Bulan == '00') {
                                                    $isBulan = '00';
                                                }
                                            }
                                            echo $isBulan . ' - ' . $r->Tahun;
                                            ?></td>
                                        <td><?= $r->namakategori ?></td>
                                        <td><?= $r->Terjual ?></td>
                                        <td align="right">Rp. <?= number_format($r->penghasilan, 0, ',', '.') ?></td>
                                        <td><?= $r->namatoko ?></td>
                                    </tr>
                                    <?php $total += $r->penghasilan; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="mt-2 card-footer py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Total Pendapatan : Rp. <?= number_format($total, 0, ',', '.') ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    var ctx = document.getElementById('myChartKategori').getContext('2d');
    /*<?php
        $x = 1;
        if (count($hasil) > 0) {
            foreach ($hasil as $data) {
                $bilangan['$x'] =  $data->penghasilan;
                $x++;
            }
        }

        ?>
    $y = 1;
    if (count($hasil) > 0) {
        <?php $max = count($hasil->penghasilan) ?>
        while ($y <= $max) {
            $number_string = $bilangan[y].toString(),
                $sisa = $number_string.length % 3,
                $rupiah = $number_string.substr(0, $sisa),
                $ribuan = $number_string.substr($sisa).match(/\d{3}/g);
            if ($ribuan) {
                $separator = $sisa ? '.' : '';
                $rupiah[y] += $separator + $ribuan.join('.');
                $rupiah1[y] = $rupiah[y]
            }
            $y++;
        }

    }*/
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                if (count($hasil) > 0) {
                    foreach ($hasil as $data) {
                        echo "'" . '(' . $data->Tahun . '-' . $data->Bulan . ') ' . "',";
                    }
                }
                ?>
            ],
            datasets: [{
                label: 'Jumlah Penghasilan (Rp) ',
                backgroundColor: '#ADD8E6',
                borderColor: '##93C3D2',
                data: [
                    /*
                                        <?php
                                        $z = 1;
                                        while ($z <= $max) {
                                            echo $rupiah1['$z'] . ",";
                                            $z++;
                                        }
                                        ?>
                    */
                    <?php
                    if (count($hasil) > 0) {
                        foreach ($hasil as $data) {
                            echo $data->penghasilan . ",";
                        }
                    }
                    ?>

                ]
            }]
        },
    });
</script>