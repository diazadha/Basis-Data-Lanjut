<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pesanan Terbaru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead align="center">
                        <tr align="center">
                            <th>ID Invoice</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Nama Pembeli</th>
                            <th>Email</th>
                            <th>No. Handphone</th>
                            <th>Kota</th>
                            <th>Kode Pos</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesanan as $psn) : ?>
                            <tr align="center">
                                <td><?= $psn->id ?></td>
                                <td><?= $psn->batas_bayar ?></td>
                                <td align="left"><?= $psn->nama_pemesan ?></td>
                                <td align="left"><?= $psn->email ?></td>
                                <td><?= $psn->hp_pemesan ?></td>
                                <td><?= $psn->kota_pemesan ?></td>
                                <td><?= $psn->kodepos ?></td>
                                <td>
                                    <form action="<?= base_url() . 'toko/invoice/detail/' . $psn->id ?>" method="post" enctype="multipart/form-data">
                                        <center>
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></button>
                                        </center>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>