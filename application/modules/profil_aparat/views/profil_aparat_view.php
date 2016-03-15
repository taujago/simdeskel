
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="nama" width="200" sortable="true"><strong>Nama</strong> </th>
				 	</tr>
        </thead>
		<thead>
			<tr><th field="nip" width="200" sortable="true"><strong>NIP</strong> </th>
				<th field="niap" width="200" sortable="true"><strong>NIAP </strong> </th>
              
				<th field="jk" width="30" sortable="true"><strong>JK</strong></th>
		
				<th field="tmp_lahir" width="200" sortable="true"><strong>Tmp Lahir</strong></th>
				<th field="tgl_lahir" width="200" sortable="true"><strong>Tgl Lahir </strong></th>
				<th field="pangkat" width="200" sortable="true"><strong>Pangkat </strong></th>
				<th field="jabatan" width="200" sortable="true"><strong>Jabatan</strong></th>
				 
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
		 
	 	 
		<input type="text" name="search_tentang" id="search_nama" placeholder="Nama aparat" />
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