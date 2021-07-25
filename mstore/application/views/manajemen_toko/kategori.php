<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                <button class='btn btn-sm btn-primary tomboladdkategori' data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus fa-sm"></i> Tambah Kategori </button>
            </h6>
        </div>
    </div>
    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead align="center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($kategori as $k) : ?>
                            <tr align="center">
                                <th scope="row"><?= $i; ?></th>
                                <td align="left"><?= $k['nama_kategori']; ?></td>
                                <td align="left"><?= $k['keterangan']; ?></td>

                                <td align="center">
                                    <!-- <a href="<?= base_url('toko/databarang/hapus_barang/'); ?><?= $brg->id_barang ?>" class="btn btn-danger btn-sm"> <i class="fas fa-trash" onclick="return confirm('Are You Sure?');" ?></i> </a> -->

                                    <a href="<?= base_url('toko/kategoribarang/edit/'); ?><?= $k['id']; ?>" class="btn btn-primary btn-sm tampilmodaleditkategori" data-toggle="modal" data-target="#exampleModal" data-id="<?= $k['id']; ?>"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('toko/kategoribarang/deletekategori/'); ?><?= $k['id']; ?>" onclick="return confirm('Are You Sure?');" class="btn btn-danger btn-sm"><i class="fas fa-trash" ?> </i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- End of Main Content -->

<!-- Modal -->
<div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('toko/kategoribarang/tambah_kategori'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
                        <?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Deskripsi">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_toko" name="id_toko" value="<?= $toko['id'] ?>">
                        <?= form_error('id_toko', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>