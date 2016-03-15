
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="tanggal" width="100" sortable="true"><strong>Tanggal </strong> </th>
				<th field="asal" width="200" sortable="true"><strong>Asal Tanah Milik</strong> </th>
				<th field="no_sertifikat" width="100" sortable="true"><strong>No. Sertifikat </strong> </th>
				<th field="luas" width="50" sortable="true"><strong>Luas</strong></th>
				<th field="kelas" width="50" sortable="true"><strong>Kelas</strong></th>
			</tr>
		<thead>
			<tr>
				<th field="tkd" width="200" sortable="true"><strong>Perolehan TKD</strong></th>
				<th field="tkd_tgl" width="150" sortable="true"><strong>Tanggal Peroleh</strong></th>
				<th field="tkd_jenis" width="200" sortable="true"><strong>Jenis TKD </strong></th>
				<th field="lokasi" width="200" sortable="true"><strong>Lokasi</strong></th>
				<th field="peruntukan" width="200" sortable="true"><strong>Peruntukan</strong></th> 
				<th field="patok2" width="50" sortable="true"><strong>Patok</strong></th> 
				<th field="papan_nama2" width="100" sortable="true"><strong>Papan Nama</strong></th> 				 
			</tr>
			
		</thead>
		 

	</table>


<div id="tb" style="padding:5px;height:auto">
	<div >		
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru()" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a> 		
 		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus();">Hapus</a>
 		<a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak()">Cetak</a>
 		<a href="#" class="easyui-linkbutton" iconCls="icon-excel" plain="true" onclick="excel()">Excel</a>
		<br />
		 
	</div>
	
	<div>		
		<fieldset> <legend>Pencarian</legend>
		 
	 	 
		<input type="text" name="search_asal" id="search_asal" placeholder="Asal TKD" />
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