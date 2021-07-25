<div class="container-fluid">
    <div class="row">

        <div class="card col-xl-12 col-lg-7">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('toko/invoice/status') ?>">Status Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('toko/invoice/detail') ?>">Detail Pesanan</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                </div>
            </div>

            <div class="modal-footer ml-auto">
                <a href="<?= base_url('toko/invoice/index') ?>">
                    <div class="btn btn-sm btn-secondary">Kembali</div>
                </a>
            </div>
        </div>
    </div>
</div>