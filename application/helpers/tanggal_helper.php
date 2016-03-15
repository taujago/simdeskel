<?php

function flipdate($tanggal){
	if(empty($tanggal)) {
		return "";
	}

	$x = explode("-", $tanggal);
	$x[0] = isset($x[0])?$x[0]:"0";
	$x[1] = isset($x[1])?$x[1]:"0";
	$x[2] = isset($x[2])?$x[2]:"0";
	return $x[2]."-".$x[1]."-".$x[0];
}

function rupiah($x)
 {
 	return "Rp ".number_format($x,0,',','.');
 }

 function tgl_indo($tgl){
	$tmp = explode("-", $tgl);
	$bln = intval($tmp[1]);

	$arr_bln = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober",
		"November","Desember");

	$ret = $tmp[0]." ".strtoupper($arr_bln[$bln])." ".$tmp[2];
	return $ret;

}

function show_array($arr) {
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

?>