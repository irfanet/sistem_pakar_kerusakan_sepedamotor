$(document).ready(function(){
    if(typeof flashStatus !== 'undefined' && flashMsg !== 'undefined'){
        if (flashStatus=='notvalidate'){
            Swal.fire({
                position: 'center',
                showConfirmButton: true,
                timer: 2500,
                icon: 'warning',
                title: flashMsg
            }).then((result)=>{
                $("#alertSuccess").append('<div class="alert alert-warning text-center" style="opacity: 0.8;" role="alert">'+flashMsg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            })
        } else if (flashStatus=='SucessInsert'){
            Swal.fire({
                position: 'center',
                showConfirmButton: true,
                timer: 2500,
                icon: 'success',
                title: flashMsg
            }).then((result)=>{
                $("#alertSuccess").append('<div class="alert alert-success text-center" style="opacity: 0.8;" role="alert">Berhasil menambahkan data Curah Hujan, <a href="' + site_url + '" class="alert-link">Klik untuk melihat daftar Curah Hujan !</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            })
        } else if (flashStatus=='FailedInsert'){
            Swal.fire({
                position: 'center',
                showConfirmButton: true,
                timer: 2500,
                icon: 'danger',
                title: flashMsg
            }).then((result)=>{
                $("#alertSuccess").append('<div class="alert alert-danger text-center" style="opacity: 0.8;" role="alert">'+flashMsg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            })
        } else if (flashStatus=='SucessUpdate'){
            Swal.fire({
                position: 'center',
                showConfirmButton: true,
                timer: 2500,
                icon: 'success',
                title: flashMsg
            }).then((result)=>{
                $("#alertSuccess").append('<div class="alert alert-success text-center" style="opacity: 0.8;" role="alert">Berhasil mengubah data Curah Hujan, <a href="' + site_url + '" class="alert-link">Klik untuk melihat daftar Curah Hujan !</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            })
        } else if (flashStatus=='FailedUpdate'){
            Swal.fire({
                position: 'center',
                showConfirmButton: true,
                timer: 2500,
                icon: 'danger',
                title: flashMsg
            }).then((result)=>{
                $("#alertSuccess").append('<div class="alert alert-danger text-center" style="opacity: 0.8;" role="alert">'+flashMsg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            })
        }
    }
});