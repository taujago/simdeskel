<table id="tt" class="easyui-datagrid" style="width:900px;height:350px"
			url="<?php echo site_url("provinsi/get_data")  ?>"
			title="Data Provinsi"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="kode_prov" width="80" sortable="true">Kode</th>
				
				<th field="provinsi" width="500" sortable="true">Provinsi</th>
 
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
		<input type="text" id="search_provinsi" name="search_provinsi" />
		<a href="#" class="easyui-linkbutton" iconCls="icon-search" onclick="cari()">Cari</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-reset" onclick="reset_search()">Reset </a>
		</fieldset> 
		
	</div> 

</div>

<?php 
$this->load->view("provinsi_form");
$this->load->view("provinsi_js");
?>