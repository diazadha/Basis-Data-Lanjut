$(function () {

    $('.tomboladdkategori').on('click', function () {
        $('#exampleModalLabel').html('Tambah Kategori Baru');
        $('.modal-footer button[type=submit]').html('Tambah Kategori');
    });

    $('.tampilmodaleditkategori').on('click', function () {
        $('#exampleModalLabel').html('Edit Kategori Barang');
        $('.modal-footer button[type=submit]').html('Update Kategori');
        $('.modal-content form').attr('action', 'http://localhost/mstore/toko/kategoribarang/edit');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mstore/toko/kategoribarang/geteditkategori',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama_kategori').val(data.nama_kategori);
                $('#keterangan').val(data.keterangan);
                $('#id').val(data.id);
            }

        });
    });

})