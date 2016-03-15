

<table id="tt" class="easyui-datagrid" style="width:950px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				<th field="ck" checkbox="true"></th>
				
				<th field="dusun" width="200" sortable="true">Dusun</th>
				<th field="desa" width="300" sortable="true">Desa</th>
				<th field="kecamatan" width="300" sortable="true">Kecamatan</th>
  
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
		    	 echo form_dropdown('search_id_kecamatan',$arr_kecamatan2,'', 'id="search_id_kecamatan" onchange="get_desa(this,\'#search_id_desa\',0)"');
		?>
		<?php
		    	 echo form_dropdown('search_id_desa',array('x'=>" - Semua Desa - "),'', 'id="search_id_desa" ');
		?>
 		<input type="text" name="search_dusun" id="search_dusun" placeholder="Nama dusun" />
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