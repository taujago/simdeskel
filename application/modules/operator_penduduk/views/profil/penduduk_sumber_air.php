<style>.wi1{width:450px}</style>
<form id="sumber_air" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="sumber_air" />
<br />
<fieldset>
<br />
	<legend><strong>Sumber Air Minum yang Digunakan Anggota Keluarga </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi1">Sumber Air Minum yang Digunakan Anggota Keluarga</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_sumber_air","id_sumber_air","sumber_air","sumber_air");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_sumber_air", $data,
!empty($arr_detail['id_sumber_air'])?$arr_detail['id_sumber_air']:"",'id="id_sumber_air"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<br />
<fieldset>
<br />
	<legend><strong>Kualitas Air Minum yang Digunakan Anggota Keluarga </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi1">Kualitas Air Minum yang Digunakan Anggota Keluarga</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_sumber_air","id_sumber_air","sumber_air","sumber_air");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_kualitas_air", $data,
!empty($arr_detail['id_kualitas_air'])?$arr_detail['id_kualitas_air']:"",'id="id_kualitas_air"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<br />
<?php 
$data['label'] = "Pemanfaatan Danau/Sungai/Waduk/Situ/Mata air oleh Keluarga ";
$data['id'] = "table_air";
$data['table'] = "master_pemanfaatan_danau";
$data['id_t'] = "id_pemanfaatan_danau";
$data['data_t'] = "pemanfaatan_danau";
$data['ck_name'] = "id_pemanfaatan_danau";
$data['arr_danau'] = $this->dm->get_arr("penduduk_pemanfaatan_danau","id_pemanfaatan_danau",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('sumber_air')">Simpan</a>