<form id="kelembagaan" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="kelembagaan" />
<fieldset>
<br />
	<legend><strong>Lembaga Pemerintahan yang Diikuti Anggota Keluarga </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi1">Lembaga Pemerintahan yang Diikuti Anggota Keluarga</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_lembaga_diikuti","id_lembaga_diikuti","lembaga_diikuti","lembaga_diikuti");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_lembaga_diikuti", $data,
!empty($arr_detail['id_lembaga_diikuti'])?$arr_detail['id_lembaga_diikuti']:"",'id="id_lembaga_diikuti"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<br />
<fieldset>
<br />
	<legend><strong>Lembaga Kemasyarakatan yang Diikuti Anggota Keluarga </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi1">Lembaga Kemasyarakatan yang Diikuti Anggota Keluarga</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_lembaga_kemasyarakatan_master","id_lembaga_kemasyarakatan_master","lembaga","lembaga");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_lembaga_kemasyarakatan", $data,
!empty($arr_detail['id_lembaga_kemasyarakatan'])?$arr_detail['id_lembaga_kemasyarakatan']:"",'id="id_lembaga_kemasyarakatan"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<fieldset>
<br />
	<legend><strong>Kedudukan dalam lembaga kemasyarakatan </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi1">Kedudukan dalam lembaga kemasyarakatan</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_lembaga_politik","id_lembaga_politik","lembaga_politik","lembaga_politik");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_kedudukan_kelembagaan", $data,
!empty($arr_detail['id_kedudukan_kelembagaan'])?$arr_detail['id_kedudukan_kelembagaan']:"",'id="id_kedudukan_kelembagaan"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('kelembagaan')">Simpan</a>