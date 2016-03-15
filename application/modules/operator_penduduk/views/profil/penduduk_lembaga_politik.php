<form id="lembaga_politik" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="lembaga_politik" />
<fieldset>
<br />
	<legend><strong>Lembaga Politik yang Diikuti Anggota Keluarga </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi1">Lembaga Politik yang Diikuti Anggota Keluarga</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_partai_politik","id_partai_politik","partai_politik","partai_politik");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_partai_politik", $data, !empty($arr_detail['id_partai_politik'])?$arr_detail['id_partai_politik']:"",'id="id_partai_politik"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<fieldset>
<br />
	<legend><strong>Kedudukan dalam Partail Politik </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi1">Lembaga Politik yang Diikuti Anggota Keluarga</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_lembaga_politik","id_lembaga_politik","lembaga_politik","lembaga_politik");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_lembaga_politik", $data,
!empty($arr_detail['id_lembaga_politik'])?$arr_detail['id_lembaga_politik']:"",''); ?>
</td>
</tr>
</table>
<br />
</fieldset>
</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('lembaga_politik')">Simpan</a>