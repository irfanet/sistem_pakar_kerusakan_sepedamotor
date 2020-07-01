$(document).ready(function(){
    // hide date input on first load page
    $("#dateMingguan").hide();
    $("#dateBulanan").hide();
    $("#dateHarian").hide();

    // function date range picker
	$(function () {
		//Date range picker
		$('#inputDate').daterangepicker()
	})

    // Function Date Form
    $("#inputPeriode").change(function(){
        if($(this).val()=='hb'){
            $("#dateBulanan").show();
            $("#dateMingguan").hide();
            $("#dateHarian").hide();
        } else if($(this).val()=='hm'){
            $("#dateMingguan").show();
            $("#dateBulanan").hide();
            $("#dateHarian").hide();
            /* kalau mau pake style attribut 
            document.getElementById("dateMingguan").style.display = "block";
            document.getElementById("dateBulanan").style.display = "none";
            */
        } else if($(this).val()=='hh'){
            $("#dateMingguan").hide();
            $("#dateBulanan").hide();
            $("#dateHarian").show();
        } else {
            $("#dateMingguan").hide();
            $("#dateBulanan").hide();
            $("#dateHarian").hide();
        }
    })

    /* sweet alert */
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
                $("#alertSuccess").append('<div class="alert alert-success text-center" style="opacity: 0.8;" role="alert">Berhasil menambahkan data Curah Hujan, <a href="' + site_url + '" class="alert-link">Klik untuk melihat daftar Data Curah Hujan !</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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
                $("#alertSuccess").append('<div class="alert alert-success text-center" style="opacity: 0.8;" role="alert">Berhasil mengubah data Curah Hujan, <a href="' + site_url + '" class="alert-link">Klik untuk melihat daftar Data Curah Hujan !</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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

})


/* untuk input tahunan */
var step = 1;
/* run fungsi showTab */
showTab(step);
$("#alertDanger").hide();
console.log(baseurl);

/* fungsi show tab */
function showTab(n){
    if (n === 1) {
        $("#btnSubmit").hide();
        $("#btnNext").show();
        $("#btnPrev").hide();
        $("#sfp").hide();
        $("#ffp").show();
    } else if (n > 1){
        $("#btnSubmit").show();
        $("#btnNext").hide();
        $("#btnPrev").show();
        $("#sfp").show();
        $("#ffp").hide();
    }
    $.ajax({
        url: baseurl + "page_load",
        success: function (data) { $('#formTahunan').append(data); },
        dataType: 'php'
    });
}

/* fungsi tombol btnNext */
function btnNextPrev(next) {
    step = step + next;
    if(next == 1) {
        if(validate() != "validated"){
            /*$("#alertSuccess").append('<div class="alert alert-danger text-center" style="opacity: 0.8;" role="alert">Semua Harus Terisi</div>');*/
            $("#alertDanger").show();
        }else {
            showTab(step);
            $("#alertDanger").hide();
        }
    } else {
        showTab(step);
        $("#alertDanger").hide();
    }

}

/* fungsi validasi di form step 1 */
function validate(){
    var das = $("#inputDAS").val();
    var periode = $("#inputPeriode").val();
    var tahun = $("#inputTahun").val();
    
    var dasValid = (das != "") ? true : false; 
    var periodeValid = (periode != "") ? true : false;
    var tahunValid = (tahun != "") ? true : false;

    if(dasValid === true && periodeValid === true && tahunValid === true ) {
        valid = "validated"
    } else if (dasValid === false) {
        valid = "inputDas"
    } else if (periodeValid === false) {
        valid = "inputPeriode"
    } else if (tahunValid === false) {
        valid = "inputTahun"
    }
    return valid;
}