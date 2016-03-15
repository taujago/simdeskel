<table id="grid_kk" class="easyui-datagrid" style="width:950px;height:300px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $title ?>"  singleSelect="true" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				 
				
				<th field="no_kk" width="150" sortable="true">No. KK </th>
				<th field="nama" width="200" sortable="true">Nama KK</th>
				<th field="alamat" width="200" sortable="true">Alamat</th>
				<th field="rt" width="30" sortable="true">RT</th>
				<th field="rw" width="30" sortable="true">RW</th>
				<th field="desa" width="100" sortable="true">Desa</th>
				<th field="kecamatan" width="100" sortable="true">Kecamatan</th>
				<th field="jumlah" width="50" sortable="true">Jumlah</th>
 
			</tr>
		</thead>
	</table>


<div id="tb" style="padding:5px;height:auto">
	<div >		
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru()" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus();">Hapus</a>
		
		<br />
		 
	</div>
	
	<div>		
		<fieldset> <legend>Pencarian</legend>
		<?php
		    echo form_dropdown('search_id_kecamatan',$arr_kecamatan,'',
		    'id="search_id_kecamatan" onchange="get_desa(this,\'#search_id_desa\')" ');
		?>
		<?php
		    	 echo form_dropdown('search_id_desa',array('x'=>" - Semua Desa - "),'', 'id="search_id_desa"');
		?>

		<input type="text" id="search_nama" name="search_nama" placeholder="Nama Kepala Keluarga" />

		<a href="#" class="easyui-linkbutton" iconCls="icon-search" onclick="cari()">Cari</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-reset" onclick="reset_search()">Reset </a>
		</fieldset> 
		
	</div> 

</div>



<!-- section anggota keluarga --> 
<br /><br />
<a id="atas"></div>
<table id="grid_kk_anggota" class="easyui-datagrid" style="width:950px;height:300px"
			url="<?php echo site_url("$controller/get_data_anggota")  ?>"
			title="Data Anggota Keluarga"  singleSelect="true" toolbar="#tb_kk"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				 
				
				<th field="nik" width="150" sortable="true">NIK</th>
				<th field="nama" width="200" sortable="true">Nama</th>
				<th field="jk" width="30" sortable="true">JK</th>
				<th field="ttl" width="200" sortable="true">TTL</th>
				<th field="sebagai" width="100" sortable="true">Sebagai</th>
				<th field="anakke" width="100" sortable="true">Anak ke</th>
				
 
			</tr>
		</thead>
	</table>

<div id="tb_kk" style="padding:5px;height:auto">
	<a href="#atas" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="tambah_anggota();">Tambah Anggota KK</a>
	<a href="#atas" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus_anggota();">Hapus Anggota KK</a>
</div>

<?php 
$this->load->view($controller."_form");
$this->load->view($controller."_js");
// $this->load->view("js/global_js");


?>