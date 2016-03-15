
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="nama_pemilik" width="200" sortable="true"><strong>NAMA PEMILIK </strong> </th>
 				<th field="luas" width="100" sortable="true"><strong>LUAS (Ha) </strong> </th>
                	</tr>
		
        </thead>
		<thead>
        	<tr>
				
				
		
 
				<th field="luas_sertifikat_hm" width="100" sortable="true"><strong>SHM </strong></th>
				<th field="luas_sertifikat_hgb" width="100" sortable="true"><strong>HGB </strong></th>
                <th field="luas_sertifikat_hp" width="100" sortable="true"><strong>HP  </strong></th>
                <th field="luas_sertifikat_hgu" width="100" sortable="true"><strong>HGU</strong></th>
                <th field="luas_sertifikat_hpl" width="100" sortable="true"><strong> HPL</strong></th>
                <th field="luas_sertifikat_ma" width="100" sortable="true"><strong>MA</strong></th>
                <th field="luas_sertifikat_vi" width="200" sortable="true"><strong>VI</strong></th>
                <th field="luas_sertifikat_tn" width="200" sortable="true"><strong>TN</strong></th>
                <th field="non_pertanian_perumahan" width="200" sortable="true"><strong>PERUMAHAN</strong></th>
                 <th field="non_pertanian_perdagangan" width="200" sortable="true"><strong>PERDAGANGAN</strong></th>
                <th field="non_pertanian_perkantoran" width="200" sortable="true"><strong>PERKANTORAN</strong></th>
				<th field="non_pertanian_industri" width="200" sortable="true"><strong>INDUSTRI</strong></th>
				<th field="non_pertanian_fasilitas_umum" width="200" sortable="true"><strong>FASILITAS UMUM</strong></th>
				<th field="pertanian_sawah" width="200" sortable="true"><strong>SAWAH</strong></th>
				<th field="pertanian_tegalan" width="200" sortable="true"><strong>TEGALAN</strong></th>
				<th field="pertanian_perkebunan" width="200" sortable="true"><strong>PERKEBUNAN</strong></th>
				<th field="pertanian_peternakan" width="200" sortable="true"><strong>PETERNAKAN/PERIKANAN</strong></th>
                <th field="pertanian_hutan" width="200" sortable="true"><strong>HUTAN BELUKAR</strong></th>
                <th field="pertanian_hutan_lindung" width="200" sortable="true"><strong>HUTAN LEBAT / LINDUNG</strong></th>
                <th field="pertanian_tanah_kosong" width="200" sortable="true"><strong>TANAH KOSONG</strong></th>
                <th field="pertanian_lain" width="200" sortable="true"><strong>LAIN - LAIN</strong></th>
				 
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
		 
	 	 
		<input type="text" size="40" name="search_nama" id="search_nama" placeholder="Nama Pemilik " />
		 
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