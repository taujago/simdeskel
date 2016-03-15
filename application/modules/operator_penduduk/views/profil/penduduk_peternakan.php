<form id="peternakan" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="peternakan" />
<?php		 
$data['title1'] = "Kepemilikan Jenis Ternak Keluarga pada Tahun Ini ";//title fieldset
$data['title2'] = "Kepemilikan Jenis Ternak";//title tabel
$data['id'] = "kepemilikan_ternak";//suffix untuk id tabel
$data['url'] = "$controller/get_tambahan";//suffix untuk id tabel
$data['f1'] = "kepemilikan_ternak";//field db pertama
$data['f2'] = "hasil_produksi_ternak";//field db kedua
//$data['f3'] = "hasil_tanaman_buah";//field db ketiga
$data['l1'] = "Nama Ternak ";//field db pertama
$data['l2'] = "Hasil (Ekor)";//field db kedua
//$data['l3'] = "Hasil (kg)";//field db ketiga
$data['id1'] = 'id_kepemilikan_ternak';//id table master
$data['id2'] = 'id_produksi_ternak';//id data table master
$data['table'] = 'penduduk_produksi_ternak'; // nama tabel yang di-request 
$data['table_m'] = 'master_kepemilikan_ternak'; // nama tabel master 
$data1 = $data;
$this->load->view("profil/grid1",$data); 
$this->load->view("profil/toolbar1",$data); 
?> 
<br />
<?php		 
$data['title1'] = "Usaha Pengolahan Hasil Ternak ";//title fieldset
$data['title2'] = "Usahan Pengolahan Hasil Ternak";//title tabel
$data['id'] = "hasil_ternak";//suffix untuk id tabel
$data['url'] = "$controller/get_tambahan";//suffix untuk id tabel
$data['f1'] = "pengolahan_ternak";//field db pertama
$data['f2'] = "hasil_produksi_pengolahan_ternak";//field db kedua
//$data['f3'] = "hasil_tanaman_buah";//field db ketiga
$data['l1'] = "Nama Hasil Ternak ";//field db pertama
$data['l2'] = "Banyaknya Produksi ";//field db kedua
//$data['l3'] = "Hasil (kg)";//field db ketiga
$data['id1'] = 'id_pengolahan_ternak';//id table master
$data['id2'] = 'id_produksi_pengolahan_ternak';//id data table master
$data['table'] = 'penduduk_produksi_pengolahan_ternak'; // nama tabel yang di-request 
$data['table_m'] = 'master_pengolahan_ternak'; // nama tabel master 
$data2 = $data;
$this->load->view("profil/grid1",$data); 
$this->load->view("profil/toolbar1",$data); 
?> 
</form>
<?php
$this->load->view("profil/penduduk_form1",$data1);
$this->load->view("profil/penduduk_form1",$data2);
?>