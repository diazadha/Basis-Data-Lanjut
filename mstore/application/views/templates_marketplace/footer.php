<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Makmudin <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/'); ?>js/script.js"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#Select', function() {
            // var id_barang = $(this).data('id');
            var nama_barang = $(this).data('namabrg');
            var stok_barang = $(this).data('stok');
            // $('#id_barang').val(id_barang);
            $('#nama_barang').val(nama_barang);
            $('#stok_barang').val(stok_barang);
            $('#barang').modal('hide');
        })
    })
</script>

<script type="text/javascript">
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script>
    $('#myModal').modal('show');
</script>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var id_prov = $('#provinsi').val();
            if (id_prov != '') {
                $.ajax({
                    url: "<?= base_url() . 'marketplace/fetch_kabupaten'; ?>",
                    method: "POST",
                    data: {
                        id_prov: id_prov
                    },
                    success: function(data) {
                        $('#kabupaten').html(data);

                    }
                })
            } else {
                $('#kabupaten').html('<option value="">Select City</option>');
                $('#kecamatan').html('<option value="">Select District</option>');
                $('#kelurahan').html('<option value="">Select Village</option>');
            }
        });
        $('#kabupaten').change(function() {
            var id_kab = $('#kabupaten').val();
            if (id_kab != '') {
                $.ajax({
                    url: "<?= base_url() . 'marketplace/fetch_kecamatan'; ?>",
                    method: "POST",
                    data: {
                        id_kab: id_kab
                    },
                    success: function(data) {
                        $('#kecamatan').html(data);

                    }
                })
            } else {
                $('#kecamatan').html('<option value="">Select District</option>');
                $('#kelurahan').html('<option value="">Select Village</option>');
            }
        });
        $('#kecamatan').change(function() {
            var id_kec = $('#kecamatan').val();
            if (id_kec != '') {
                $.ajax({
                    url: "<?= base_url() . 'marketplace/fetch_kelurahan'; ?>",
                    method: "POST",
                    data: {
                        id_kec: id_kec
                    },
                    success: function(data) {
                        $('#kelurahan').html(data);
                    }
                })
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('#upload_form').on('submit', function(e) {
            e.preventDefault();
            if ($('#image_file').val() == '') {
                alert("Please Select the File");
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>marketplace/ajax_upload",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $('#uploaded_image').html(data);
                    }
                });
            }
        });
    });
</script>