
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
			<th field="ck" checkbox="true"></th>
			<th field="tanggal" width="100" sortable="true"><strong>Tanggal </strong> </th>
			</tr>
		</thead>
		<thead>
			<tr>
				
				<th field="nomor_surat_masuk" width="200" sortable="true"><strong>Nomor surat masuk </strong> </th>
				<th field="tanggal_surat_masuk" width="100" sortable="true"><strong>Tanggal<br>surat masuk </strong> </th>
				<th field="pengirim_surat_masuk" width="200" sortable="true"><strong>Pengirim surat masuk  </strong></th>
				<th field="isi_surat_masuk" width="200" sortable="true"><strong>Isi surat masuk </strong></th>
				<th field="isi_surat_keluar" width="200" sortable="true"><strong>Isi surat keluar </strong></th>
				<th field="tanggal_surat_keluar" width="100" sortable="true"><strong>Tanggal<br>surat keluar </strong></th>
				<th field="tujuan" width="200" sortable="true"><strong>Tujuan<br>surat keluar </strong></th>
				<th field="ket" width="200" sortable="true"><strong>Keterangan </strong></th>
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
		 
	 	 
		<input type="text" name="search_tentang" id="search_tentang" placeholder="Pengirim" />
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