<form id="hasil_hutan" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="hasil_hutan" />
<fieldset>
<br />
	<legend><strong>Kepemilikan Lahan Hutan </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi">Kepemilikan Lahan Hutan</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_kepemilikan_lahan","id_kepemilikan_lahan","kepemilikan_lahan","kepemilikan_lahan");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_kepemilikan_hutan", $data,
!empty($arr_detail['id_kepemilikan_hutan'])?$arr_detail['id_kepemilikan_hutan']:"",'id="id_kepemilikan_hutan"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<br />
<?php		 
$data['title1'] = "Produksi Hasil Hutan Milik Keluarga pada Tahun Ini ";//title fieldset
$data['title2'] = "Produksi Hasil Hutan";//title tabel
$data['id'] = "tanaman_hutan";//suffix untuk id tabel
$data['url'] = "$controller/get_tambahan";//suffix untuk id tabel
$data['f1'] = "produksi_hutan";//field db pertama
$data['f2'] = "hasil_produksi_hutan";//field db kedua
//$data['f3'] = "hasil_tanaman_buah";//field db ketiga
$data['l1'] = "Nama Hasil Hutan ";//field db pertama
$data['l2'] = "Hasil ";//field db kedua
//$data['l3'] = "Hasil (kg)";//field db ketiga
$data['id1'] = 'id_produksi_hutan';//id table master
$data['id2'] = 'id_produksi_hutan';//id data table master
$data['table'] = 'penduduk_produksi_hutan'; // nama tabel yang di-request 
$data['table_m'] = 'master_produksi_hutan'; // nama tabel master 
$data1 = $data;
$this->load->view("profil/grid1",$data); 
$this->load->view("profil/toolbar1",$data); 
?> 
</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('hasil_hutan')">Simpan</a>
<?php
$this->load->view("profil/penduduk_form1",$data);
?>