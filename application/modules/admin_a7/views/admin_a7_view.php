
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
				<th field="ck" checkbox="true"></th>
 				<th field="tanggal" width="100" sortable="true"><strong>Tanggal</strong> </th>
				<th field="masuk_tanggal" width="200" sortable="true"><strong>Tanggal Surat Masuk </strong> </th>
				<th field="masuk_nomor" width="200" sortable="true"><strong>Nomor Surat Masuk  </strong></th>
			</tr>
		<thead>
			<tr>
				 <th field="masuk_pengirim" width="200" sortable="true"><strong>Pengirim </strong></th>
				<th field="masuk_isi_singkat" width="200" sortable="true"><strong>Isi singkat surat Masuk  </strong></th>
				<th field="keluar_isi_singkat" width="200" sortable="true"><strong>Isi Singakt Surat Keluar </strong></th>
				<th field="keluar_tanggal" width="200" sortable="true"><strong>Tanggal Surat Keluar </strong> </th>
				<th field="keluar_nomor" width="200" sortable="true"><strong>Nomor Surat Keluar  </strong></th>
				<th field="keluar_tujuan" width="200" sortable="true"><strong>Tujuan Surat Keluar </strong></th>

				<th field="keterangan" width="200" sortable="true"><strong>Keterangan</strong></th>
				 
			</tr>
			
		</thead>
		 

	</table>


<div id="tb" style="padding:5px;height:auto">
	<div >		
    	<a href="<?php echo site_url("admin_menu"); ?>" class="easyui-linkbutton" iconCls="icon-back" plain="true"  >Kembali</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru()" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a> 		
 		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus();">Hapus</a>
 		<a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak()">Cetak</a>
 		<!-- <a href="#" class="easyui-linkbutton" iconCls="icon-excel" plain="true" onclick="excel()">Excel</a> -->
		<br />
		 
	</div>
	
	<div>		
		<fieldset> <legend>Pencarian</legend>
		 
	 	<?php 
		$arr = array("x"=>" -- SEMUA JENIS SURAT --  " ,"masuk"=>" SURAT MASUK","keluar"=>"SURAT KELUAR");
		echo form_dropdown("search_jenis_surat",$arr,'','id="search_jenis_surat"');
		?> 
		<input type="text" name="search_isi" id="search_isi" placeholder="Isi Surat " />
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