<div class="container-fluid">
    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"> Tambah Barang</i></button>
    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#tambah_kategori"><i class="fas fa-plus fa-sm"> Tambah Kategori</i></button>
    <table class="table table-bordered mt-3">
        <tr align="center">
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th colspan="3">Aksi</th>
        </tr>
        <?php
        $no = 1;
        foreach ($barang as $brg) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $brg->nama_barang ?></td>
                <td><?= $brg->id_kategori ?></td>
                <td><?= $brg->harga_barang ?></td>
                <td><?= $brg->stok_barang ?></td>
                <td>
                    <div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>
                    <div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>
                    <div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<!-- Large modal Tambah Barang -->
<div class="modal fade bd-example-modal-lg" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Barang</h5>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td width="200"><label>Nama Barang</label></td>
                            <td width="400"><input type="text" name="nama_kategor" class="form-control"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Small modal Tambah Kategori -->
<div class="modal fade bd-example-modal-sm" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori Barang</h5>
                    </center>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'toko/databarang/tambah_aksi'; ?>">
                        <div class="form-group">
                            <label>Kategori Barang</label>
                            <input type="text" name="nama_kategor" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>