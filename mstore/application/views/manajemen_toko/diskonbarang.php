<div class="container-fluid">
    <button class='btn btn-sm btn-primary' data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Add New Discount Product</button>
    <?php
    if (isset($diskon)) {
    ?>
        <?php foreach ($diskon as $dsk) { ?>
            <div class="card-body">
                <?= 'name : ' . $dsk->name; ?>
            </div>
            <div class="card-body">
                <?= $dsk->code; ?>
            </div>
            <?= base_url('toko/diskonbarang/edit/' . $dsk->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?>

            <?= base_url('toko/diskonbarang/hapus/' . $dsk->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-trash"></i></div>') ?>
        <?php } ?>
    <?php } ?>
</div>