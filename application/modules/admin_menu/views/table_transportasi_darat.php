IV. POTENSI PRASARANA DAN SARANA<BR /><br />
<div class="menjorok">A.PRASARANA DAN SARANA TRANSPORTASI<br />1. Prasarana Transportasi Darat</div>
<table class='menjorok' style="border:1px solid black;border-collapse:separate;border-spacing:0">
<tr><th class="thin">Jenis Sarana dan Prasarana</th><th class="thin">Baik<br />(km atau unit)</th><th class="thin">Rusak<br />(km atau unit)</th></tr>
<tr><td colspan="3" class="thin"><strong>1.1. <?php echo $data[0]['cat_teks'] ?></strong></td></tr>
<?php 
$cat_bef = $data[0]['cat_teks'];
$c = 2;
foreach($data as $val){ 
$cat_now = $val['cat_teks'];
if($cat_now != $cat_bef){
	echo '<tr><td colspan="3" class="thin"><strong>1.'.$c.". ".$cat_now.'</strong></td></tr>';
	$c++;
}
?>
<tr><td width="350" class="thin"><?php echo $val['jenis'] ?>&nbsp;</td><td width="125" class="thin"><?php echo $val['baik'] ?>&nbsp;</td><td width="125" class="thin"><?php echo $val['Rusak'] ?>&nbsp;</td></tr>
<?php 
$cat_bef = $val['cat_teks'];
} ?>
</table>
<p style="clear:both"></p>