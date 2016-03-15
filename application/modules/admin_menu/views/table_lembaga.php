<p style="clear:both"></p>
<div class="menjorok">B. LEMBAGA KEMASYARAKATAN</div>
<?php
$yes1 = false;
$yes2 = false;
foreach($data as $key=>$val){
if($key == $rt[0]['order']){
	$yes1 = true;
	$temp['data'] = $rt;
	$this->load->view("table_rt",$temp);
}if($key == $rw[0]['order']){
	$yes2 = true;
	$temp['data'] = $rw;
	$this->load->view("table_rt",$temp);
}
if($key == 0) {
	echo '<table class="menjorok" style="border:1px solid black;border-collapse:separate;border-spacing:0">';
	echo '<tr><td class="thin" colspan="2"><strong>Lembaga Kemasyarakatan Desa/Kelurahan (LKD/LKK)</strong></td></tr><tr><td class="thin" colspan="2">&nbsp;</td></tr>';
}
?>
<tr>
<td width="250" class="thin"><strong><?php echo $val['lembaga'] ?></strong></td><td width="350" class="thin"><?php echo $val['ket1_teks']; if(!empty($val['ket2_teks'])) echo " - ".$val['ket2_teks']; if(!empty($val['unit'])){ if($val['unit'] != '0')echo " ".$val['unit']." unit organisasi"; }?></td>
</tr>
<tr>
<td width="250" class="thin">Dasar hukum pembentukan</td><td width="350" class="thin"><?php echo $val['hukum'] ?></td>
</tr>
<tr>
<td class="thin">Jumlah pengurus</td><td class="thin"><?php echo empty($val['jumlah_pengurus'])?"":$val['jumlah_pengurus']." orang" ?></td>
</tr>
<tr>
<td class="thin">Alamat kantor</td><td class="thin"><?php echo $val['alamat'] ?></td>
</tr>
<tr>
<td class="thin">Ruang lingkup kegiatan</td><td class="thin"><?php echo empty($val['jenis'])?"":$val['jenis']." Jenis"; 
if(!empty($val['jenis']) && !empty($val['yakni'])) echo " , "; echo !empty($val['yakni'])?"Yakni ".$val['yakni']:""; ?></td>
</tr>
<?php } 
if($yes1 == false){
	$temp['data'] = $rt;
	$this->load->view("table_rt",$temp);
}if($yes2 == false){
	$temp['data'] = $rw;
	$this->load->view("table_rt",$temp);
}
?>
</table>