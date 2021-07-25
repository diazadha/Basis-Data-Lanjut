<div class="container-fluid">


    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">

            <form action="<?= base_url() . 'toko/databarang/update'; ?>" method="post">
                <?php foreach ($barang as $brg) : ?> <?php endforeach; ?>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        Nama Barang
                        <input type="text" name="nama_barang" class="form-control" value="<?= $brg->nama_barang ?>">
                    </div>
                    <div class="col-sm-6">
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
                            <input type="text" name="harga_barang" class="form-control" aria-label="harga_barang" aria-describedby="addon-wrapping" value="<?= $brg->harga_barang ?>">
                        </div>
                    </div>

                    <div class="col-sm-3 mb-3 mb-sm-0">
                        Stok
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">Qty</span>
                            </div>
                            <input type="number" min="1" max="1000" name="stok_barang" class="form-control" aria-label="stok_barang" aria-describedby="addon-wrapping" value="<?= $brg->stok_barang ?>">
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        Diskon
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping">%</span>
                            </div>
                            <input type="number" min="0" max="100" name="diskon" class="form-control" aria-label="diskon" aria-describedby="addon-wrapping" value="<?= $brg->diskon ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    Deskripsi Singkat
                    <input type="hidden" name="id_barang" class="form-control" value="<?= $brg->id_barang ?>">
                    <textarea class="form-control" rows="3" name="keterangan"><?= $brg->keterangan ?></textarea>
                </div>
                <div class="form-group">
                    Deskripsi
                    <textarea class="form-control" id="desc" rows="3" name="deskripsi_barang"><?= $brg->deskripsi_barang ?></textarea>
                </div>
                <input type="hidden" class="form-control" id="id_toko" name="id_toko" value="<?= $toko['id'] ?>">
                <input type="hidden" class="form-control" id="harga_setelahdiskon" name="harga_setelahdiskon" value="0">
                <div class="modal-footer">
                    <a href="<?= base_url('toko/databarang/index') ?>">
                        <div class="btn btn-sm btn-secondary">Kembali</div>
                    </a>
                    <button type="submit" class="btn btn-sm btn-primary">Update Barang</button>
                </div>

            </form>

        </div>
    </div>
    <script>
        CKEDITOR.replace('desc');
    </script>
</div>