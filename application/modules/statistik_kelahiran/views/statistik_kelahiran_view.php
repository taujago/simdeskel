
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="true" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
 				<th field="tanggal" width="100" sortable="true"><strong>Tanggal</strong> </th>
				<th field="no_surat" width="200" sortable="true"><strong>No. Surat</strong> </th>
				<th field="nama" width="200" sortable="true"><strong>Nama </strong></th>
				<th field="jk" width="50" sortable="true"><strong>Jk</strong></th>
				<th field="tmp_lahir" width="100" sortable="true"><strong>Tmp. Lahir</strong></th>
				<th field="tgl_lahir" width="100" sortable="true"><strong>Tgl. Lahir</strong></th>
			</tr>
			
		</thead>
		<thead >
			<tr>
			<th field="bapak_nik" width="100" sortable="true"><strong>Nik Ayah</strong></th>
			<th field="bapak_nama" width="200" sortable="true"><strong>Nama Ayah</strong></th>
			<th field="ibu_nik" width="100" sortable="true"><strong>NIK Ibu</strong></th>
			<th field="ibu_nama" width="200" sortable="true"><strong>Nama Ibu</strong></th>
			<th field="pelapor_nik" width="100" sortable="true"><strong>NIK Pelapor </strong></th>
			<th field="pelapor_nama" width="200" sortable="true"><strong>Nama Pelapor </strong></th>
			<th field="hubungan_pelapor2" width="100" sortable="true"><strong>Hubungan Pelapor </strong></th>
			<th field="penolong_kelahiran" width="200" sortable="true"><strong>Penolong Kelahiran </strong></th>
			</tr>
		</thead>

	</table>


<div id="tb" style="padding:5px;height:auto">
	<div >		
		<!--<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru()" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-detail" plain="true" onclick="detail()">Detail</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-excel" plain="true" onclick="excel()">Excel</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus();">Hapus</a>-->
        		<a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak()">Cetak</a>

		<br />
		 
	</div>
	
	 
</div>

<?php 
//$this->load->view($controller."_form");
$this->load->view($controller."_js");
$this->load->view("js/global_js");
?>