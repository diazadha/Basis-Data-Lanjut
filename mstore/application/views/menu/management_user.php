<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-3">
                <div class="card-header">
                    <a href="" class='btn btn-sm btn-primary' data-toggle="modal" data-target="#exampleModal">Tambah Admin Toko</a>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Management User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
                                    <th scope="col">Admin</th>
                                    <th scope="col">Toko</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tanggal Dibuat</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($admin as $sm) : ?>
                                    <tr align="center">
                                        <th scope="row" align="center"><?= $i; ?></th>
                                        <td><?= $sm->name ?></td>
                                        <td><?= $sm->nama_toko ?></td>
                                        <td><?= $sm->email ?></td>
                                        <td><?= date('d F Y', $sm->date_created); ?></td>
                                        <td align="center">
                                            <strong>
                                                <?php
                                                if ($sm->is_active != 0) {
                                                ?>
                                                    <span class="badge badge-info mb-1">
                                                        <?php
                                                        echo "Aktif" ?>
                                                    </span>
                                                <?php
                                                } else {
                                                ?> <span class="badge badge-danger mb-1"> <?php
                                                                                            echo "Non Aktif" ?> </span> <?php
                                                                                                                    }
                                                                                                                        ?>
                                            </strong>
                                        <td>
                                            <?= anchor('management_user/detail/' . $sm->id_admin, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?>
                                            <!-- <a href="<?= base_url('toko/databarang/hapus_barang/'); ?><?= $sm->id_admin ?>" class="btn btn-danger btn-sm"> <i class="fas fa-trash" onclick="return confirm('Are You Sure?');" ?></i> </a> -->
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
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content modal-md">
                <div class="modal-header modal-md">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Admin Toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form action="<?= base_url() . 'management_user/add_admin'; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Nama
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control " id="name" placeholder="Nama Admin">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Email
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="email" class="form-control " id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Password
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="password1" class="form-control " id="password1" placeholder="Password">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="password2" class="form-control " id="password2" placeholder="Ulangi Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Toko
                            </div>
                            <div class="col-sm-8 form-group">
                                <select name="id_toko" id="id_toko" class="form-control">
                                    <option value="">Pilih Toko</option>
                                    <?php foreach ($tokosemua as $m) : ?>
                                        <option value="<?= $m->id ?>"><?= $m->nama_toko ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>