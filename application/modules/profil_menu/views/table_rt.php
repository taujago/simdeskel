<?php foreach($data as $val){
if($val['lembaga'] == 'JUMLAH RW')echo '<tr><td class="thin"><strong>RUKUN WARGA</strong></td><td class="thin">&nbsp;</td></tr>';
if($val['lembaga'] == 'JUMLAH RT')echo '<tr><td class="thin"><strong>RUKUN TETANGGA</strong></td class="thin"><td>&nbsp;</td></tr>';
?>
<tr>
<td width="250" class="thin"><strong><?php echo $val['lembaga'] ?></strong>&nbsp;</td><td width="350" class="thin"><?php if(!empty($val['unit'])){ if($val['unit'] != '0')echo " ".$val['unit']." unit organisasi"; }?>&nbsp;</td>
</tr>
<tr>
<td width="250" class="thin">Dasar hukum pembentukan</td><td width="350" class="thin"><?php echo $val['hukum'] ?>&nbsp;</td>
</tr>
<tr>
<td class="thin">Jumlah pengurus</td><td class="thin"><?php echo empty($val['jumlah_pengurus'])?"-":$val['jumlah_pengurus']." orang" ?>&nbsp;</td>
</tr>
<tr>
<td class="thin">Alamat kantor</td><td class="thin"><?php echo $val['alamat'] ?>&nbsp;</td>
</tr>
<tr>
<td class="thin">Ruang lingkup kegiatan</td><td class="thin"><?php echo $val['jenis']." Jenis, Yakni ".$val['yakni'] ?>&nbsp;</td>
</tr>
<?php } ?>