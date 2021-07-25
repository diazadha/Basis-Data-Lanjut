<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                <button class='btn btn-sm btn-primary tomboladdpayment' data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm"></i> Tambah Metode Pembayaran</button>
            </h6>
        </div>
    </div>


    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Payment Management</h1> -->



    <div class="card shadow mb-4">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
        <?= $this->session->flashdata('message'); ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Metode Pembayaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead align="center">
                        <tr align="center">
                            <th scope="col">No</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Metode Bayar</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($pembayaran as $p) : ?>
                            <tr align="center">
                                <th scope="row"><?= $i; ?></th>
                                <td align="left"><?= $p['mitra_bayar']; ?></td>
                                <td><?= $p['metode_bayar']; ?></td>
                                <td><?= $p['rekening']; ?></td>
                                <td><?= $p['pemilik']; ?></td>
                                <td>
                                    <center>
                                        <a href="<?= base_url('toko/payment/editbayar/'); ?><?= $p['id']; ?>" class="btn btn-primary btn-sm tampilmodaleditbayar" data-toggle="modal" data-target="#exampleModal" data-id="<?= $p['id']; ?>"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('toko/payment/delete/'); ?><?= $p['id']; ?>" onclick="return confirm('Are You Sure?');" class="btn btn-danger btn-sm"><i class="fas fa-trash" ?></i></a>
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
</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->

<!-- Modal -->
<div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Metode Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('toko/payment'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="metodebayar" name="metodebayar" placeholder="Metode Bayar">
                        <?= form_error('metodebayar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mitrabayar" name="mitrabayar" placeholder="Bank">
                        <?= form_error('mitrabayar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="rekening" name="rekening" placeholder="Rekening">
                        <?= form_error('rekening', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pemilik" name="pemilik" placeholder="a/n">
                        <?= form_error('pemilik', '<small class="text-danger pl-3">', '</small>'); ?>
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