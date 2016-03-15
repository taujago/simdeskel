<?php 
$arr = array("0"=>"A","1"=>"B","2"=>"C","3"=>"D","4"=>"E","5"=>"F","6"=>"G","7"=>"H","8"=>"J","9"=>"K","10"=>"L","11"=>"M");
$i = 0;
$i1 = 2;
?>
III. PRODUK DOMESTIK DESA/KELURAHAN BRUTO
<br /><br />
<table class='menjorok' style="border:1px solid black;border-collapse:separate;border-spacing:0">
<tr><td colspan="2" class="thin"><strong><?php echo $arr[$i].". ".strtoupper($data[0]['subsek']) ?></strong>&nbsp;</td></tr>
<tr><td class="thin"><strong><?php echo $arr[$i].".1. ".$data[0]['cat_teks'] ?></strong>&nbsp;</td><td class="thin">&nbsp;</td></tr>
<?php 
$subsek_bef = strtoupper($data[0]['subsek']);
$cat_bef = $data[0]['cat_teks'];
$c = 0;
foreach($data as $val){ 
$subsek_now = strtoupper($val['subsek']);
$cat_now = $val['cat_teks'];
if($subsek_now != $subsek_bef){
	$i++;
	$i1 = 1;
	echo '<tr><td colspan="2" class="thin"><strong>'.$arr[$i].". ".$subsek_now.'</strong>&nbsp;</td></tr>';
}
if($cat_now != $cat_bef){
	if($subsek_now == $subsek_bef)echo '<tr><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td></tr>';
	echo '<tr><td class="thin"><strong>'.$arr[$i].".$i1. ".$cat_now.'</strong>&nbsp;</td><td class="thin">&nbsp;</td></tr>';
	$i1++;
}
$temp = strtoupper($val['id_satuan_teks']);
if (strpos($temp,'RP') !== false) {
    $temp = $val['id_satuan_teks']." ".number_format($val['jumlah'],2,',','.');
}
else $temp = '';
?>
<tr><td width="450" class="thin"><?php echo $val['item'] ?>&nbsp;</td><td width="150" class="thin"><?php echo empty($temp)?$val['jumlah']." ".$val['id_satuan_teks']:$temp ?>&nbsp;</td></tr>
<?php 
$cat_bef = $val['cat_teks'];
$subsek_bef = strtoupper($val['subsek']);
$c++;
} ?>
<tr><td width="450" class="thin"><strong><?php echo $data2[0]['teks'] ?>&nbsp;</strong></td><td width="150" class="thin"><strong><?php echo empty($data2[0]['item'])?"":"Rp ".number_format($data2[0]['item'],0,'','.') ?>&nbsp;</strong></td></tr>
</table>
<p style="clear:both"></p>