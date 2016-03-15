
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="nama" width="200" sortable="true"><strong>Nama </strong> </th>
			</tr>
		<thead>
			<tr>
				<th field="tanggal" width="100" sortable="true"><strong>Tanggal </strong> </th>
				<th field="jenis_kelamin" width="100" sortable="true"><strong>Jenis kelamin </strong> </th>
				<th field="tempat_lahir" width="100" sortable="true"><strong>Tempat lahir </strong> </th>
				<th field="tanggal_lahir" width="100" sortable="true"><strong>Tanggal lahir  </strong></th>
				<th field="agama" width="100" sortable="true"><strong>Agama </strong></th>
				<th field="jabatan" width="200" sortable="true"><strong>Jabatan </strong></th>
				<th field="pendidikan_terakhir" width="200" sortable="true"><strong>Pendidikan terakhir </strong></th>
				<th field="tanggal_pengangkatan" width="110" sortable="true"><strong>Tanggal<br>pengangkatan </strong></th>
				<th field="nomor_pengangkatan" width="200" sortable="true"><strong>Nomor pengangkatan </strong></th>
				<th field="tanggal_pemberhentian" width="110" sortable="true"><strong>Tanggal<br>pemberhentian </strong></th>
				<th field="nomor_pemberhentian" width="200" sortable="true"><strong>Nomor pemberhentian </strong></th>
				<th field="ket" width="400" sortable="true"><strong>Keterangan </strong></th> 
			</tr>
			
		</thead>
		 

	</table>


<div id="tb" style="padding:5px;height:auto">
	<div >		
    	<a href="<?php echo site_url("admin_menu"); ?>" class="easyui-linkbutton" iconCls="icon-back" plain="true"  >Kembali</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru()" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a> 		
 		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus();">Hapus</a>
 		<a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak()">Cetak</a>
 		<!-- <a href="#" class="easyui-linkbutton" iconCls="icon-excel" plain="true" onclick="excel()">Excel</a> -->
		<br />
		 
	</div>
	
	<div>		
		<fieldset> <legend>Pencarian</legend>
		 
	 	 
		<input type="text" name="search_tentang" id="search_tentang" placeholder="Nama" />
		<input type="text" name="search_tgl_awal" id="search_tgl_awal" /> s.d 
		<input type="text" name="search_tgl_akhir" id="search_tgl_akhir" />
 		<a href="#" class="easyui-linkbutton" iconCls="icon-search" onclick="cari()">Cari</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-reset" onclick="reset_search()">Reset </a>
		</fieldset> 
		
	</div> 

</div>

<?php 
$this->load->view($controller."_form");
$this->load->view($controller."_js");
$this->load->view("js/global_js");
?>