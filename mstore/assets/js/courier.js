$(function () {

    $('.tomboladdcourier').on('click', function () {
        $('#exampleModalLabel').html('Add New Courier');
        $('.modal-footer button[type=submit]').html('Add');
    });

    $('.tampilmodaleditcourier').on('click', function () {
        $('#exampleModalLabel').html('Edit Courier');
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-content form').attr('action', 'http://localhost/mstore/toko/kurir/editcourier');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mstore/toko/kurir/geteditcourier',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#layanan').val(data.layanan);
                $('#hargalayanan').val(data.harga_layanan);
                $('#namaarmada').val(data.nama_armada);
                $('#id').val(data.id);
            }

        });
    });

})