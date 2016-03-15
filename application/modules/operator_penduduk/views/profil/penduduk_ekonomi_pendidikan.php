<form id="ekonomi_pendidikan" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="ekonomi_pendidikan" />
<?php 
$data['label'] = "Lembaga Ekonomi yang Dimiliki oleh Keluarga";
$data['id'] = "lembaga_ekonomi";
$data['table'] = "master_lembaga_ekonomi";
$data['id_t'] = "id_lembaga_ekonomi";
$data['data_t'] = "lembaga_ekonomi";
$data['ck_name'] = "id_lembaga_ekonomi";
$data['arr_danau'] = $this->dm->get_arr("penduduk_lembaga_ekonomi","id_lembaga_ekonomi",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Lembaga Pendidikan yang Dimiliki oleh Keluarga";
$data['id'] = "lembaga_pendidikan";
$data['table'] = "master_lembaga_pendidikan";
$data['id_t'] = "id_lembaga_pendidikan";
$data['data_t'] = "lembaga_pendidikan";
$data['ck_name'] = "id_lembaga_pendidikan";
$data['arr_danau'] = $this->dm->get_arr("penduduk_lembaga_pendidikan","id_lembaga_pendidikan",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('ekonomi_pendidikan')">Simpan</a>