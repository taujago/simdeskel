<table id="tt" class="easyui-datagrid" style="width:900px;height:350px"
			url="<?php echo site_url("$controller/get_data_rekening")  ?>"
			title="Setting Data Rekening Perusahaan" iconCls="icon-save" toolbar="#tb"
			rownumbers="false" pagination="true">
		<thead>
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="id_bank" width="80" sortable="true"><b>Kode</b></th>
				<th field="nama_bank" width="200"  sortable="true"><b>Nama Bank</b></th>
				<th field="no_rekening" width="200"  sortable="true"><b>Nomor Rekening</b></th>
				<th field="atas_nama" width="200" sortable="true"><b>Atas Nama</b></th>
				<th field="kantor_cabang" width="200" sortable="true"><b>Cabang</b></th>
 
			</tr>
		</thead>
	</table>
	
<div id="tb"  style="padding:5px;height:auto">
	
	<div >		
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru()" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus();">Hapus</a>
		<br />
		 
	</div>
	
	 
	 
		
</div>
 
  
 
<?php
$this->load->view("setting_rekening_form"); 
$this->load->view("setting_rekening_js"); 
?>
