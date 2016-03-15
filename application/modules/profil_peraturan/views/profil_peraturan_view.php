
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="nomor" width="100" sortable="true"><strong>Nomor</strong> </th>
				<th field="tanggal" width="100" sortable="true"><strong>Tanggal</strong> </th>
				<th field="tentang" width="200" sortable="true"><strong>Tentang </strong> </th>
				<th field="persetujuan_bpd_no" width="200" sortable="true"><strong>No. Persetujuan BPD  </strong></th>
			</tr>
		<thead>
			<tr>
				<th field="persetujuan_bpd_tgl" width="200" sortable="true"><strong>Tgl. Persetujuan BPD </strong></th>
				<th field="dilaporkan_no" width="200" sortable="true"><strong>Nomor dilaporkan </strong></th>
				<th field="dilaporkan_tgl" width="200" sortable="true"><strong>Tgl. Dilaporkan </strong></th>
				<th field="keterangan" width="200" sortable="true"><strong>Keterangan</strong></th>
				 
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
		 
	 	 
		<input type="text" name="search_tentang" id="search_tentang" placeholder="Tentang" />
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