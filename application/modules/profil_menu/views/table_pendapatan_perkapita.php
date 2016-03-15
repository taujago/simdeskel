<p style="clear:both"></p>
IV. PENDAPATAN PERKAPITA
<div class="menjorok">A. Pendapatan perkapita menurut sektor usaha</div>
<table class="menjorok" style="border:1px solid black;border-collapse:separate;border-spacing:0">
<?php foreach($data as $i=>$val){ ?>
<tr><td width="350" class="thin"><strong><?php echo $val['title'] ?></strong>&nbsp;</td><td width="250" class="thin">&nbsp;</td></tr>
<?php
	$c = 1;
	foreach($val as $val1){
		if(count($val1)!=1){
		$temp = strtoupper($val1['id_satuan_teks']);
		if (strpos($temp,'RP') !== false) {
    		$temp = $val1['id_satuan_teks']." ".number_format($val1['jumlah'],2,',','.');
		}
		else $temp = '';
?>
		<tr><td class="thin"><?php echo $val1['ket']?>&nbsp;</td><td class="thin"><?php echo empty($temp)?$val1['jumlah']." ".$val1['id_satuan_teks']:$temp ?>&nbsp;</td></tr>
<?php } $c++; } ?>
<tr><td width="350" class="thin">&nbsp;</td><td width="250" class="thin">&nbsp;</td></tr>
<?php }?>
</table>
<p style="clear:both"></p>