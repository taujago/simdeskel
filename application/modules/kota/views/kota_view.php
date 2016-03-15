<table id="tt" class="easyui-datagrid" style="width:900px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="Data Kota"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				<th field="ck" checkbox="true"></th>
				
				<th field="kode_kota" width="80" sortable="true">Kode</th>
				
				<th field="kota" width="300" sortable="true">Kota</th>
				<th field="provinsi" width="300" sortable="true">Provinsi</th>
 
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
		    echo form_dropdown('search_id_provinsi',$arr_provinsi,'',
		    'id="search_id_provinsi" ');
		?>
		<input type="text" id="search_kota" name="search_kota" />

		<a href="#" class="easyui-linkbutton" iconCls="icon-search" onclick="cari()">Cari</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-reset" onclick="reset_search()">Reset </a>
		</fieldset> 
		
	</div> 

</div>

<?php 
$this->load->view($controller."_form");
$this->load->view($controller."_js");
?>