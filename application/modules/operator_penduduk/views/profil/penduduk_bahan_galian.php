<form id="bahan_galian" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="bahan_galian" />
<?php		 
$data['title1'] = "Produksi Bahan Galian yang Dimiliki Anggota Keluarga";//title fieldset
$data['title2'] = "Produksi Bahan Galian";//title tabel
$data['id'] = "bahan_galian";//suffix untuk id tabel
$data['url'] = "$controller/get_galian";//suffix untuk id tabel
$data['f1'] = "bahan_galian";//field db pertama
$data['f2'] = "hasil_bahan_galian";//field db kedua
$data['f3'] = "milik_adat";//field db ketiga
$data['f4'] = "milik_perorangan";//field db ketiga
$data['f5'] = "satuan";//field db ketiga
$data['l1'] = "Nama Bahan Galian";//field db pertama
$data['l2'] = "Produksi/thn";//field db kedua
$data['l3'] = "Milik Adat";//field db ketiga
$data['l4'] = "Milik Perorangan";//field db ketiga
$data['l5'] = "Satuan";//field db ketiga
$data['id1'] = 'id_bahan_galian';//id table master
$data['id2'] = 'id_bahan_galian';//id data table master
$data['table'] = 'penduduk_produksi_bahan_galian'; // nama tabel yang di-request 
$data['table_m'] = 'master_bahan_galian'; // nama tabel master 
$data1 = $data;
$this->load->view("profil/grid_tambang",$data); 
$this->load->view("profil/toolbar_tambang",$data); 
?> 
</form>
<?php $this->load->view("profil/penduduk_form_tambang",$data); ?>