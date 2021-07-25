<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                <button class='btn btn-sm btn-primary' data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Add New Product</button>
            </h6>
        </div>
    </div>

    <div class="card shadow mb-4">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
        <?= $this->session->flashdata('message'); ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Products</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead align="center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barang as $brg) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $brg->nama_barang ?></td>

                                <td><?= $brg->nama_kategori ?></td>

                                <td> Rp. <?= number_format($brg->harga_barang, 0, ',', '.') ?></td>
                                <td><?= $brg->stok_barang ?></td>
                                <td>
                                    <center>
                                        <!-- <div class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail"><i class="fas fa-search-plus"></i></div> -->
                                        <?= anchor('toko/databarang/detail/' . $brg->id_barang, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?>
                                        <?= anchor('toko/databarang/edit/' . $brg->id_barang, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?>
                                        <a href="<?= base_url('toko/databarang/hapus_barang/'); ?><?= $brg->id_barang ?>" class="btn btn-danger btn-sm"> <i class="fas fa-trash" onclick="return confirm('Are You Sure?');" ?></i> </a>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah barang -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header modal-lg">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="card-body">
                    <form action="<?= base_url() . 'toko/databarang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Product Name
                                <input type="text" name="nama_barang" class="form-control">
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Category
                                <select name="id_kategori" id="id_kategori" class="form-control">
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Stock Product
                                <input type="number" name="stok_barang" class="form-control">
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Price Product
                                <input type="number" name="harga_barang" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                Discount Product
                                <input type="text" name="diskon" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            Sort Description
                            <textarea class="form-control" rows="3" name="keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            Description
                            <textarea class="form-control" id="desc" rows="3" name="deskripsi_barang"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Picture Product</label>
                            <input type="file" name="foto_barang" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_toko" name="id_toko" value="<?= $toko['id'] ?>">
                            <?= form_error('id_toko', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
                <script>
                    CKEDITOR.replace('desc');
                </script>

            </div>
        </div>
    </div>
</div>


<!-- Modal Detil barang -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header modal-lg">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php foreach ($barang as $brg) : ?>
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url() . '/uploads/barang/' . $brg->foto_barang ?>" height="303 px" width="270 px" style="border:2px ridge #0404B4;">
                            </div>

                            <div class=" col-md-7 ml-5">
                                <table class="table" border="0">
                                    <td>
                                        <strong>
                                            <h4 class="font-weight-bold text-primary"><?= $brg->nama_barang ?></h4>
                                        </strong>
                                    </td>
                                    <tr>
                                        <td><?= $brg->keterangan ?></td>
                                    </tr>
                                    <tr>
                                        <td>
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
                                                </strong></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>In Stock : <?= $brg->stok_barang ?></td>
                                    </tr>
                                    <tr>
                                        <td>Description : <?= $brg->deskripsi_barang ?></td>
                                    </tr>
                                </table>
                            </div>
                        <?php endforeach; ?>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit barang -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header modal-lg">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <form action="<?= base_url() . 'toko/databarang/update'; ?>" method="post">
                            <?php foreach ($barang as $brg) : ?> <?php endforeach; ?>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    Name Product
                                    <input type="text" name="nama_barang" class="form-control" value="<?= $brg->nama_barang ?>">
                                </div>
                                <div class="col-sm-6">
                                    Category Product
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    Stock Product
                                    <input type="number" min="1" max="500" name="stok_barang" class="form-control" value="<?= $brg->stok_barang ?>">
                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    Price Product
                                    <input type="text" name="harga_barang" class="form-control value=" value="<?= number_format($brg->harga_barang, 0, ',', '.') ?>">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    Discount
                                    <input type="number" min="0" max="500" name="diskon" class="form-control" value="<?= $brg->diskon ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                Sort Description
                                <input type="hidden" name="id_barang" class="form-control" value="<?= $brg->id_barang ?>">
                                <textarea class="form-control" rows="3" name="keterangan"><?= $brg->keterangan ?></textarea>
                            </div>
                            <div class="form-group">
                                Description
                                <textarea class="form-control" id="desc" rows="3" name="deskripsi_barang"><?= $brg->deskripsi_barang ?></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>

                        </form>
                    </div>
                </div>
                <script>
                    CKEDITOR.replace('desc');
                </script>
            </div>
        </div>
    </div>