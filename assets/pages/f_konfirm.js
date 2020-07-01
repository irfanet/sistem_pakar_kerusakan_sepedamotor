function confirmDel(get_id){
    event.preventDefault();

    /* get data dari tag dengan id delBtn */
    var link = $('#delBtn').data('href');
    var delItem = $('#delBtn').data('item');

    if(delItem === 'das'){
        var warningMsg = 'Apakah anda yakin ?';
    } else if (delItem === 'hujan'){
        var warningMsg = 'Data akan terhapus permanen !';
    }

    /* Custom tombol sweetalert 2 */
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    /* Fire sweetAlert untuk konfirmasi */
    swalWithBootstrapButtons.fire({
        title: 'ANDA YAKIN MENGHAPUS DATA ?',
        text: warningMsg,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus Data !',
        cancelButtonText: 'Tidak, Batalkan !',
        reverseButtons: true
    }).then((result) => {
        /* jika klik tombol confirm, kirim data id via ajax */
        if (result.value){
            $.ajax({
                type: 'POST',
                url: link,
                data: {"postID":get_id},
                proccesData: false,
                /* jika ajax sukses mengirim data */
                success: function(data){
                    /* jika hasil return function delete success */
                    if(data==='successDel'){
                        Swal.fire({
                            position: 'center',
                            showConfirmButton: true,
                            timer: 1500,
                            icon: 'success',
                            title: 'Data berhasil dihapus !'
                        }).then((result)=>{
                            location.reload();
                        })
                    } else if (data==='failedDel') {
                        Swal.fire({
                            position: 'center',
                            showConfirmButton: true,
                            timer: 1500,
                            icon: 'error',
                            title: 'Data gagal dihapus !'
                        }).then((result)=>{
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            showConfirmButton: true,
                            timer: 150000,
                            icon: 'error',
                            //title: 'Terjadi Kesalahan pada sistem. Silahkan coba beberapa saat lagi !'
                            title: data
                        }).then((result)=>{
                            location.reload();
                        })
                    }
                },
                /* Jika ajax gagal mengirim data */
                error: function (data) {
                    Swal.fire({
                        posisiton: 'center',
                        showConfirmButton: true,
                        timer: 1500,
                        icon: 'error',
                        title: data
                    }).then((result)=>{
                        location.reload();
                    })
                }
            })
        /* Jika klik tombol batal */
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Dibatalkan',
                'Data batal dihapus !',
                'warning'
            )
        }
    })

}