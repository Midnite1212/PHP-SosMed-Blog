<?php
function tgl_indonesia($date){
    /**ARRAY**/
    $Hari= array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan= array ("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
    $tahun = substr ($date, 0, 4);
    $bulan = substr ($date, 5, 2);
    $tgl   = substr ($date, 8, 2);
    $waktu = substr ($date, 11, 5);
    $hari  = date ("w", strtotime ($date)); /** maksud strtotime?? **/
    
    $result = $Hari [$hari]. ", ". $tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." WIB";
    return $result;
}
?>