<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <form action="<?= site_url('toko/stock/process') ?>">
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label> Date </label>
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" placeholder="Date" value="<?= date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label> Item Product </label>
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="hidden" name="id_barang" id="id_barang">
                            <input type="text" class="form-control" placeholder="Product" aria-describedby="button-addon2" name="nama_barang" id="nama_barang" required autofocus>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="button-addon2" data-toggle="modal" data-target="#barang"><i class="fas fa-search fa-sm"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label> Product Name </label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly></br>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label> Initial Stock </label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="stok_barang" id="stok_barang" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label> Qty </label>
                    </div>
                    <div class="col-sm-4">
                        <input type="number" name="stok_barang" class="form-control" min="1" id="exampleLastName" placeholder="Stock Qty">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label> Detail </label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="detail" class="form-control" placeholder="Tambahan Stok Produk/ Stok Barang Masuk" required>

                    </div>
                </div>
                <div class="form-group mt-4" align="right">
                    <button class='btn btn-sm btn-primary'><i class="fas fa-plus fa-sm"></i> Add Qty Product</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal tambah barang -->
    <div class="modal fade" id="barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header modal-lg">
                        <h5 class="modal-title" id="exampleModalLongTitle">Select Product Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>Nama Barang</th>
                                    <th>Kategori Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Stok Barang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barang as $brg) { ?>

                                    <tr>

                                        <td><?= $brg->nama_barang ?></td>
                                        <td><?= $brg->nk ?></td>
                                        <td> Rp. <?= number_format($brg->harga_barang, 0, ',', '.') ?></td>
                                        <td><?= $brg->stok_barang ?></td>
                                        <td><button class="btn btn-xs btn-info" id="Select" data-namabrg="<?= $brg->nama_barang ?>" data-stok="<?= $brg->stok_barang ?>">
                                                <i class="fa fa-check"></i> Select
                                            </button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>