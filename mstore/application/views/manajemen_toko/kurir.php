<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                <button class='btn btn-sm btn-primary tomboladdcourier' data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm"></i> Tambah Kurir</button>
            </h6>
        </div>
    </div>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
        <?= $this->session->flashdata('message'); ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kurir</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead align="center">
                        <tr align="center">
                            <th scope="col">No</th>
                            <th scope="col">Armada</th>
                            <th scope="col">Layanan</th>
                            <th scope="col">Harga</th>

                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($armada as $a) : ?>
                            <tr align="left">
                                <th scope="row">
                                    <center><?= $i; ?></center>
                                </th>
                                <td><?= $a['nama_armada']; ?></td>
                                <td><?= $a['layanan']; ?></td>
                                <td align="right">Rp. <?= number_format($a['harga_layanan'], 0, ',', '.') ?></td>
                                <td>
                                    <center>
                                        <a href="<?= base_url('toko/kurir/editcourier/'); ?><?= $a['id']; ?>" class="btn btn-primary btn-sm tampilmodaleditcourier" data-toggle="modal" data-target="#exampleModal" data-id="<?= $a['id']; ?>"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('toko/kurir/delete/'); ?><?= $a['id']; ?>" onclick="return confirm('Are You Sure?');" class="btn btn-danger btn-sm"><i class="fas fa-trash" ?></i></a>
                                    </center>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kurir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('toko/kurir'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="layanan" name="layanan" placeholder="Layanan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="hargalayanan" name="hargalayanan" placeholder="Harga">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="namaarmada" name="namaarmada" placeholder="Armada">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_toko" name="id_toko" value="<?= $toko['id'] ?>">
                        <?= form_error('id_toko', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>