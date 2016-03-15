
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="jenis_inventaris" width="200" sortable="true"><strong>Jenis Barang / Inventaris </strong> </th>
				<th field="asal_sendiri" width="100" sortable="true"><strong>Beli Sendiri</strong> </th>
				<th field="asal_pemerintah" width="100" sortable="true"><strong>Pemerintah </strong> </th>
 				<th field="asal_sumbangan" width="100" sortable="true"><strong>Sumbangan </strong> </th>
			</tr>
		<thead>
			<tr>
 
				<th field="awal_tahun_baik" width="200" sortable="true"><strong>Keadaan Baik Awal Tahun </strong></th>
				<th field="awal_tahun_rusak" width="200" sortable="true"><strong>Keadaan Rusak Awal Tahun  </strong></th>
                <th field="hapus_rusak" width="200" sortable="true"><strong>Hapus Rusak  </strong></th>
                <th field="hapus_jual" width="200" sortable="true"><strong>Hapus Dijual  </strong></th>
                 <th field="hapus_sumbang" width="200" sortable="true"><strong>Hapus Disumbangkan   </strong></th>
                <th field="hapus_tanggal" width="200" sortable="true"><strong>Tgl. Penghapusan    </strong></th>
                <th field="akhir_tahun_baik" width="200" sortable="true"><strong>Keadaan Baik Akhir Tahun    </strong></th>
                <th field="akhir_tahun_rusak" width="200" sortable="true"><strong>Keadaan Rusak Akhir Tahun    </strong></th>
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
		 
	 	 
		<input type="text" size="40" name="search_jenis" id="search_jenis" placeholder="Jenis Barang/Inventaris" />
		 
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