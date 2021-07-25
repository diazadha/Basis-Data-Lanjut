<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Histori Pesanan</h6>
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
                            <!-- <th>Order Date</th>
                            <th>Time Expired </th> -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($invoice as $inv) : ?>
                            <tr align="center">
                                <td><?= $inv['id']; ?></td>
                                <td><?= $inv['batas_bayar']; ?></td>
                                <td align="left"><?= $inv['nama_pemesan']; ?></td>
                                <td align="left"><?= $inv['email']; ?></td>
                                <td><?= $inv['hp_pemesan']; ?></td>
                                <td><?= $inv['kota_pemesan']; ?></td>
                                <td><?= $inv['kodepos']; ?></td>
                                <!-- <td><?= $inv['order_date']; ?></td>
                                <td><?= $inv['batas_bayar']; ?></td> -->
                                <td>
                                    <form action="<?= base_url() . 'toko/invoice/detail/' . $inv['id']; ?>" method="post" enctype="multipart/form-data">
                                        <center>
                                            <!-- <input type="hidden" class="form-control" id="id_invoice" name="id_invoice" value="<?= $inv['id']; ?>"> -->
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