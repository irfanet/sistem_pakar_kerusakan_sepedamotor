$(document).ready(function(){
    // hide date input on first load page
    $("#dateMingguan").hide();
    $("#dateBulanan").hide();

    // function date range picker
	$(function () {
		//Date range picker
		$('#inputDate').daterangepicker()
	})

    // Function Date Form
    $("#inputPeriode").change(function(){
        if($(this).val()=='hb'){
            $("#dateMingguan").hide();
            $("#dateBulanan").show();
        } else if($(this).val()=='hm'){
            $("#dateMingguan").show();
            $("#dateBulanan").hide();
            /* kalau mau pake style attribut 
            document.getElementById("dateMingguan").style.display = "block";
            document.getElementById("dateBulanan").style.display = "none";
            */
        } else {
            $("#dateMingguan").hide();
            $("#dateBulanan").hide();
        }
    })
})