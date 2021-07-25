$(function () {

    $('.tomboladdpayment').on('click', function () {
        $('#exampleModalLabel').html('Add New Payment');
        $('.modal-footer button[type=submit]').html('Add');
    });

    $('.tampilmodaleditbayar').on('click', function () {
        $('#exampleModalLabel').html('Edit Payment');
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-content form').attr('action', 'http://localhost/mstore/toko/payment/editbayar');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mstore/toko/payment/geteditbayar',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#metodebayar').val(data.metode_bayar);
                $('#mitrabayar').val(data.mitra_bayar);
                $('#rekening').val(data.rekening);
                $('#pemilik').val(data.pemilik);
                $('#id').val(data.id);
            }

        });
    });

})