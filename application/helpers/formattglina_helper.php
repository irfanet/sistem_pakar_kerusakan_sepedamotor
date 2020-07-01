<?php 
function tanggalan($tgl){
    $bulanIndo = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    );


    $pecahtgl = explode('-', $tgl);

    $return = $bulanIndo[$pecahtgl[1]].' Tahun '.$pecahtgl[0];
    return $return;

} 