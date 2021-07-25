$(function () {

    $('.tomboladdmenu').on('click', function () {
        $('#exampleModalLabel').html('Tambah Menu Baru');
        $('.modal-footer button[type=submit]').html('Tambah Menu');
    });

    $('.tomboladdsubmenu').on('click', function () {
        $('#exampleModalLabel').html('Tambah Sub Menu Baru');
        $('.modal-footer button[type=submit]').html('Tambah Sub Menu');
    });

    $('.tampilmodaleditsub').on('click', function () {
        $('#exampleModalLabel').html('Edit Sub Menu');
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-content form').attr('action', 'http://localhost/mstore/menu/editsub');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mstore/menu/geteditsub',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#title').val(data.title);
                $('#id_menu').val(data.id_menu);
                $('#url').val(data.url);
                $('#icon').val(data.icon);
                $('#is_active').val(data.is_active);
                $('#id').val(data.id);
            }

        });
    });

    $('.tampilmodaledit').on('click', function () {
        $('#exampleModalLabel').html('Edit Menu');
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-content form').attr('action', 'http://localhost/mstore/menu/edit');


        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/mstore/menu/getedit',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#menu').val(data.menu);
                $('#id').val(data.id);
            }
        });
    });


});