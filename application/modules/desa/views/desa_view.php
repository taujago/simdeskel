<table id="tt" class="easyui-datagrid" style="width:950px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="Data Desa"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="id" width="70" sortable="true">ID </th>
				<th field="desa" width="200" sortable="true">Desa</th>
				<th field="kecamatan" width="300" sortable="true">Kecamatan</th>
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
		<a href="#" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="copy();">Copy</a>
		
		<br />
		 
	</div>
	
	<div>		
		<fieldset> <legend>Pencarian</legend>
		<?php
		    echo form_dropdown('search_id_provinsi',$arr_provinsi,'',
		    'id="search_id_provinsi" onchange="get_kota(this,\'#search_id_kota\',0)"');
		?>
		<?php
		    	 echo form_dropdown('search_id_kota',array('x'=>" - Semua Kota - "),'', 'id="search_id_kota" onchange="get_kecamatan(this,\'#search_id_kecamatan\')"');
		?>

		<?php
		    	 echo form_dropdown('search_id_kecamatan',array('x'=>" - Semua Kota - "),'', 'id="search_id_kecamatan"');
		?>

		<input type="text" id="search_desa" name="search_desa" />

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