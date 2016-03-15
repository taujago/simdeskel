<style>.wi{width:200px}</style>
<form id="kesejahteraan" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="kesejahteraan" /><br />
<?php 
$data['label'] = "Kedudukan Anggota Keluarga sebagai Wajib Pajak dan Retrebusi";
$data['id'] = "kedudukan_pajak";
$data['table'] = "master_kedudukan_pajak";
$data['id_t'] = "id_kedudukan_pajak";
$data['data_t'] = "kedudukan_pajak";
$data['ck_name'] = "id_kedudukan_pajak";
$data['arr_danau'] = $this->dm->get_arr("penduduk_kedudukan_pajak","id_kedudukan_pajak",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Masalah Kesejahteraan Keluarga";
$data['id'] = "kesejahteraan_kel";
$data['table'] = "master_kesejahteraan_kel";
$data['id_t'] = "id_kesejahteraan_kel";
$data['data_t'] = "kesejahteraan_kel";
$data['ck_name'] = "id_kesejahteraan_kel";
$data['arr_danau'] = $this->dm->get_arr("penduduk_kesejahteraan_kel","id_kesejahteraan_kel",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('kesejahteraan')">Simpan</a>