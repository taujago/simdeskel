<form id="hasil_perkebunan" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="hasil_perkebunan" />

<?php		 
$data['title1'] = "Produksi Tanaman Buah-buahan pada Tahun Ini ";//title fieldset
$data['title2'] = "Produksi Tanaman Buah-buahan";//title tabel
$data['id'] = "tanaman_buah";//suffix untuk id tabel
$data['url'] = "$controller/get_tambahan";//suffix untuk id tabel
$data['f1'] = "produksi_tanaman_buah";//field db pertama
$data['f2'] = "lahan_tanaman_buah";//field db kedua
$data['f3'] = "hasil_tanaman_buah";//field db ketiga
$data['f4'] = "lahan_tanaman_buah2";//field db ketiga
$data['l1'] = "Nama Buah";//field db pertama
$data['l2'] = "Banyak Pohon (Pohon)";//field db kedua
$data['l3'] = "Hasil (kg)";//field db ketiga
$data['l4'] = "Luas (are)";//field db ketiga
$data['id1'] = 'id_produksi_tanaman_buah';//id table master
$data['id2'] = 'id_produksi_tanaman_buah';//id data table master
$data['table'] = 'penduduk_produksi_tanaman_buah'; // nama tabel yang di-request 
$data['table_m'] = 'master_produksi_tanaman_buah'; // nama tabel master 
$data1 = $data;
$this->load->view("profil/grid3",$data); 
$this->load->view("profil/toolbar",$data); 
?> 
<br />
<?php
$data['title1'] = "Produksi Tanaman Obat pada Tahun Ini ";//title fieldset
$data['title2'] = "Produksi Tanaman Obat ";//title tabel
$data['id'] = "tanaman_obat";//suffix untuk id tabel
$data['url'] = "$controller/get_tambahan";//suffix untuk id tabel
$data['f1'] = "produksi_tanaman_obat";//field db pertama
$data['f2'] = "lahan_tanaman_obat";//field db kedua
$data['f3'] = "hasil_tanaman_obat";//field db ketiga
$data['l1'] = "Nama Tanaman";//field db pertama
$data['l2'] = "Luas Lahan (are)";//field db kedua
$data['l3'] = "Hasil (kg)";//field db ketiga
$data['id1'] = 'id_produksi_tanaman_obat';//id table master
$data['id2'] = 'id_produksi_tanaman_obat';//id data table master
$data['table'] = 'penduduk_produksi_tanaman_obat'; // nama tabel yang di-request 
$data['table_m'] = 'master_produksi_tanaman_obat'; // nama tabel master 
$data2 = $data;
$this->load->view("profil/grid",$data); 
$this->load->view("profil/toolbar",$data); 
?> 
<br />
<fieldset>
<br />
	<legend><strong>Kepemilikan Lahan Perkebunan </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi">Kepemilikan Lahan Perkebunan (menurut kategori)</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_kepemilikan_lahan","id_kepemilikan_lahan","kepemilikan_lahan","kepemilikan_lahan");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_kepemilikan_perkebunan", $data,
!empty($arr_detail['id_kepemilikan_perkebunan'])?$arr_detail['id_kepemilikan_perkebunan']:"",'id="id_kepemilikan_perkebunan"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<fieldset>
<br />
	<legend><strong>Luas lahan perkebunan </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi">Luas lahan perkebunan (ha) </td>
			<td> : <input type="text" name="luas_perkebunan" /></td>
        </tr>
        </table>
<br />
</fieldset>
<br />
<?php
$data['title1'] = "Produksi Komoditas Perkebunan pada Tahun Ini ";//title fieldset
$data['title2'] = "Produksi Komoditas Perkebunan ";//title tabel
$data['id'] = "tanaman_perkebunan";//suffix untuk id tabel
$data['url'] = "$controller/get_tambahan";//suffix untuk id tabel
$data['f1'] = "produksi_perkebunan";//field db pertama
$data['f2'] = "lahan_perkebunan";//field db kedua
$data['f3'] = "hasil_perkebunan";//field db ketiga
$data['l1'] = "Jenis";//field db pertama
$data['l2'] = "Pohon";//field db kedua
$data['l3'] = "Hasil";//field db ketiga
$data['id1'] = 'id_produksi_perkebunan';//id table master
$data['id2'] = 'id_produksi_perkebunan';//id data table master
$data['table'] = 'penduduk_produksi_perkebunan'; // nama tabel yang di-request 
$data['table_m'] = 'master_produksi_perkebunan'; // nama tabel master 
$data3 = $data;
$this->load->view("profil/grid",$data); 
$this->load->view("profil/toolbar",$data); 
?> 
</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('hasil_perkebunan')">Simpan</a>
<?php 
$data = $data1;
$this->load->view("profil/penduduk_form2",$data);
$data = $data2; 
$this->load->view("profil/penduduk_form",$data);
$data = $data3; 
$this->load->view("profil/penduduk_form",$data);
?>