<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                <button class='btn btn-sm btn-primary' data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>
            </h6>
        </div>
    </div>

    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead align="center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barang as $brg) : ?>
                            <tr align="center">
                                <td><?= $no++ ?></td>
                                <td align="left"><?= $brg->nama_barang ?></td>

                                <td><?= $brg->nama_kategori ?></td>

                                <td align="right"> Rp. <?= number_format($brg->harga_barang, 0, ',', '.') ?></td>
                                <td><?= $brg->stok_barang ?></td>
                                <td align="left"><?= $brg->admin_toko ?> </td>
                                <td>
                                    <center>
                                        <!-- <div class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail"><i class="fas fa-search-plus"></i></div> -->
                                        <?= anchor('toko/databarang/detail/' . $brg->id_barang, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?>
                                        <?= anchor('toko/databarang/edit/' . $brg->id_barang, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?>
                                        <a href="<?= base_url('toko/databarang/hapus_barang/'); ?><?= $brg->id_barang ?>" onclick="return confirm('Are You Sure?');" class="btn btn-danger btn-sm"> <i class="fas fa-trash" ?></i> </a>
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
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Nama Barang
                                <input type="text" name="nama_barang" class="form-control">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Kategori
                                <select name="id_kategori" id="id_kategori" class="form-control">
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                Harga
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Rp.</span>
                                    </div>
                                    <input type="text" name="harga_barang" class="form-control" aria-label="harga_barang" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Stok
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">Qty</span>
                                    </div>
                                    <input type="number" min="1" max="1000" name="stok_barang" class="form-control" aria-label="stok_barang" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                Diskon
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">%</span>
                                    </div>
                                    <input type="number" value="0" min="0" max="100" name="diskon" class="form-control" aria-label="diskon" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            Deskripsi Singkat
                            <textarea class="form-control" rows="3" name="keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            Deskripsi
                            <textarea class="form-control" id="desc" rows="3" name="deskripsi_barang"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto Barang</label>
                            <input type="file" name="foto_barang" class="form-control">
                        </div>
                        <input type="hidden" class="form-control" id="harga_setelahdiskon" name="harga_setelahdiskon" value="0">

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_toko" name="id_toko" value="<?= $toko['id'] ?>">
                            <?= form_error('id_toko', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <input type="hidden" class="form-control" id="admin" name="admin" value="<?= $this->session->userdata('email') ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah Produk</button>
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