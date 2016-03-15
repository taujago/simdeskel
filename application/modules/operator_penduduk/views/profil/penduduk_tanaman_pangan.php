<?php $form_id ="tanaman_pangan";
?>
<form id="tanaman_pangan" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="tanaman_pangan" />
<fieldset>
	<legend><strong>Kepemilikan Lahan Pertanian </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi">Kepemilikan Lahan Pertanian</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_kepemilikan_lahan","id_kepemilikan_lahan","kepemilikan_lahan","kepemilikan_lahan");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_kepemilikan_lahan", $data,
!empty($arr_detail['id_kepemilikan_lahan'])?$arr_detail['id_kepemilikan_lahan']:"",'id="id_kepemilikan_lahan"'); ?>
</td>
</tr>
</table>
</fieldset>
<br />
<?php
$data['title1'] = "Produksi Tanaman Pangan Menurut Komoditas Tahun Ini ";//title fieldset
$data['title2'] = "Produksi Tanaman Pangan ";//title tabel
$data['id'] = "tanaman_pangan";//suffix untuk id tabel
$data['url'] = "$controller/get_tambahan";//suffix untuk id tabel
$data['f1'] = "produksi_tanaman_pangan";//field db pertama data master
$data['f2'] = "lahan_tanaman_pangan";//field db kedua
$data['f3'] = "hasil_tanaman_pangan";//field db ketiga
$data['l1'] = "Nama Komoditi";//field db pertama
$data['l2'] = "Luas Lahan (are)";//field db kedua
$data['l3'] = "Hasil (kg)";//field db ketiga
$data['id1'] = 'id_produksi_tanaman_pangan';//id table master
$data['id2'] = 'id_produksi_tanaman_pangan';//id table penduduk
$data['table'] = 'penduduk_produksi_tanaman_pangan'; // nama tabel yang di-request 
$data['table_m'] = 'master_produksi_tanaman_pangan'; // nama tabel master 
$data2 = $data;
$this->load->view("profil/grid",$data); 
$this->load->view("profil/toolbar",$data); 
?> 
<br />

</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('tanaman_pangan')">Simpan</a>
<?php 
$this->load->view("profil/penduduk_form",$data);
$this->load->view("profil/penduduk_js",$data);
?>