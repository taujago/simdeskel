
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="asal_tanah" width="200" sortable="true"><strong>ASAL TANAH MILIK DESA</strong> </th>
                	</tr>
		
        </thead>
		<thead>
        	<tr>
				
				<th field="nomor_sertifikat" width="200" sortable="true"><strong>NO. SERTIFIKAT/BUKU LETER C/PERSIL </strong> </th>
 				<th field="luas" width="100" sortable="true"><strong>LUAS (Ha) </strong> </th>
		
 
				<th field="luas_biaya_desa" width="200" sortable="true"><strong>BIAYA PEMERINTAH DESA </strong></th>
				<th field="luas_biaya_pemerintah" width="200" sortable="true"><strong>BANTUAN PEMERINTAH  </strong></th>
                <th field="luas_biaya_pemprov" width="200" sortable="true"><strong>BANTUAN PEMPROV  </strong></th>
                 <th field="luas_biaya_pemkab" width="200" sortable="true"><strong>BANTUAN PEMKAB   </strong></th>
                <th field="luas_biaya_lainnya" width="200" sortable="true"><strong> BANTUAN LAIN  </strong></th>
                 <th field="tanggal_perolehan" width="200" sortable="true"><strong>TANGAL PEROLEHAN  </strong></th>
                <th field="jenis_sawah" width="200" sortable="true"><strong>LUAS JENIS SAWAH </strong></th>
                <th field="jenis_tegalan" width="200" sortable="true"><strong>LUAS JENIS TEGALAN </strong></th>
                <th field="jenis_kebun" width="200" sortable="true"><strong>LUAS JENIS KEBUN</strong></th>
                 <th field="jenis_kolam" width="200" sortable="true"><strong>LUAS JENIS TAMBAK/KOLAM</strong></th>
                <th field="jenis_tanah_kering" width="200" sortable="true"><strong>LUAS JENIS TANAH KERING/DARAT</strong></th>
				<th field="tanda_ada" width="200" sortable="true"><strong>ADA PATOK BATAS</strong></th>
				<th field="tanda_tidak_ada" width="200" sortable="true"><strong>TIDAK ADA PATOK BATAS </strong></th>
				<th field="papan_nama_ada" width="200" sortable="true"><strong>ADA PAPAN NAMA </strong></th>
				<th field="papan_nama_tidak_ada" width="200" sortable="true"><strong>TIDAK ADA PAPAN NAMA </strong></th>
				<th field="lokasi" width="200" sortable="true"><strong>LOKASI</strong></th>
				<th field="keterangan" width="200" sortable="true"><strong>KETERANGAN</strong></th>
				 
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
		 
	 	 
		<input type="text" size="40" name="search_nama" id="search_nama" placeholder="Asal Tanah " />
		 
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