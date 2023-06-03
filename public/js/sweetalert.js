// pakai post

function konfirmasi(e) {
    // alert('ok');
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda akan menghapus permanen data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $('.'+e).submit();
        }
    });
}

// pakai get

function konfir(controller, method, id, data) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda akan menghapus permanen data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = '/' + controller + '/' + method + '/' + id + '/' + data;
        }
    });
}