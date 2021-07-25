<div class="container-fluid">
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Checkout</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="post" action="<?= base_url('marketplace/datapengiriman') ?> ">
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                Recipient Name
                                <input type="text" name="nama_pemesan" class="form-control " id="exampleFirstName" placeholder="First Name">
                            </div>
                            <div class="col-sm-4">
                                Phone Number
                                <input type="text" name="hp_pemesan" class="form-control " id="exampleLastName" placeholder="Phone Number">
                            </div>
                            <div class="col-sm-4">
                                Email
                                <input type="text" name="email" class="form-control " id="email" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                City or District
                                <input type="text" name="kota_pemesan" class="form-control " id="exampleFirstName" placeholder="City">
                            </div>
                            <div class="col-sm-6">
                                Postal Code
                                <input type="text" name="kodepos" class="form-control " id="exampleLastName" placeholder="Postal Code">
                            </div>
                        </div>
                        <div class="form-group">
                            Address
                            <textarea class="form-control" name="alamat" cols="3"> </textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_toko" name="id_toko" value="<?= $toko['id']; ?>">
                            <?= form_error('id_toko', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm" aria-haspopup="true" aria-expanded="false">
                            Apply
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Shopping Summary</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="col 1 mt-2 mb-4" align="center">
                        <?php
                        $grand_total = 0;
                        if ($keranjang = $this->cart->contents()) {
                            foreach ($keranjang as $items) {
                                $grand_total = $grand_total + $items['subtotal'];
                            }
                            echo "Total Price : Rp." . number_format($grand_total, 0, ',', '.');
                        } else {
                            echo "Keranjang masih kosong";
                        } ?>
                        <br><br>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#payment" aria-haspopup="true" aria-expanded="false">
                            Choose Payment
                        </button>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal tambah barang -->
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Choose Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'toko/databarang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Default radio
                            </label>
                        </div>
                    </form>
                    <script>
                        CKEDITOR.replace('desc');
                    </script>
                </div>
            </div>
        </div>
    </div>