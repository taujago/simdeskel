<form id="perikanan" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="perikanan" />
<fieldset>
<br />
	<legend><strong>Alat Produksi Budidaya Ikan </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi">Alat Produksi Budidaya Ikan</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_alat_produksi_ikan","id_alat_produksi_ikan","alat_produksi_ikan","alat_produksi_ikan");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_alat_produksi_ikan", $data,
!empty($arr_detail['id_alat_produksi_ikan'])?$arr_detail['id_alat_produksi_ikan']:"",'id="id_alat_produksi_ikan"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<br />
<?php		 
$data['title1'] = "Produksi Perikanan ";//title fieldset
$data['title2'] = "Produksi Perikanan";//title tabel
$data['id'] = "perikanan";//suffix untuk id tabel
$data['url'] = "$controller/get_tambahan";//suffix untuk id tabel
$data['f1'] = "produksi_perikanan";//field db pertama
$data['f2'] = "hasil_produksi_perikanan";//field db kedua
//$data['f3'] = "hasil_tanaman_buah";//field db ketiga
$data['l1'] = "Produksi Perikanan";//field db pertama
$data['l2'] = "Hasil";//field db kedua
//$data['l3'] = "Hasil (kg)";//field db ketiga
$data['id1'] = 'id_produksi_perikanan';//id table master
$data['id2'] = 'id_produksi_perikanan';//id data table master
$data['table'] = 'penduduk_produksi_perikanan'; // nama tabel yang di-request 
$data['table_m'] = 'master_produksi_perikanan'; // nama tabel master 
$data1 = $data;
$this->load->view("profil/grid1",$data); 
$this->load->view("profil/toolbar1",$data); 
?> 
</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('perikanan')">Simpan</a>
<?php
$this->load->view("profil/penduduk_form1",$data);
?>