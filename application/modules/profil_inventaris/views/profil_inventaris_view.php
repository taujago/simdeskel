
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead  >
			<tr>
				<th rowspan="2" field="ck" checkbox="true"></th>
 				<th rowspan="2" field="tanggal" width="100" sortable="true"><strong>Tanggal</strong> </th>
				<th rowspan="2" field="barang" width="300" sortable="true"><strong>Barang / Jasa </strong> </th>
				<th colspan="5"   width="200" sortable="true"><strong> Asal Barang / Bangunan </strong> </th>
				<th colspan="2"  width="200" sortable="true"><strong>Kondisi Barang / Bangunan </strong> </th>
			</tr> 
			<tr>	
		 
				<th field="asal_sendiri" width="100" sortable="true"><strong>Beli sendiri </strong></th>
				<th field="asal_pemerintah" width="100" sortable="true"><strong>Pemerintah</strong></th>
				<th field="asal_provinsi" width="100" sortable="true"><strong>Provinsi</strong></th>
				<th field="asal_pemda" width="100" sortable="true"><strong>Kab / Kota </strong></th>
				<th field="asal_sumbangan" width="100" sortable="true"><strong>Sumbangan</strong></th>
				<th field="kondisi_baik" width="100" sortable="true"><strong>Baik </strong></th>
				<th field="kondisi_rusak" width="100" sortable="true"><strong>Rusak </strong></th>
				 
			</tr>
			
		
		 

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
		 
	 	 
		<input type="text" name="search_barang" id="search_barang" placeholder="Barang / Bangunan" />
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