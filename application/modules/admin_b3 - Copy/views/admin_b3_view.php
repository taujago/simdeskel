
<div id="detail" style="min-height: 600px; width:1035px; " >
	 <div id="detail-head">
	 	<?php echo $header; ?>
	 </div>

<div>
		<p style="margin-left:20px;">
		<?php 
		$arr_bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni",
			"Juli","Agustus","September","Oktober","November","Desember");
		echo form_dropdown("bulan",$arr_bulan,'','id="bulan"');


		?>
		<input type="text" name="tahun" id="tahun" size="5" value="<?php echo date("Y"); ?>" />
		<a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak()">Cetak</a>
 	<!-- 	<a href="#" class="easyui-linkbutton" iconCls="icon-excel" plain="true" onclick="excel()">Excel</a> -->
		</p>
</div>


</div>

<!--
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="nama" width="200" sortable="true"><strong>Nama </strong> </th>
                	</tr>
        </thead>
		<thead>
			<tr>
				<th field="jk" width="50" sortable="true"><strong>JK</strong> </th>
				<th field="status_kawin" width="200" sortable="true"><strong>Status Perkawinan  </strong> </th>
				<th field="tmp_lahir" width="200" sortable="true"><strong>Tmp. Lahir  </strong></th>
                <th field="tgl_lahir" width="200" sortable="true"><strong>Tgl. Lahir  </strong></th>
		
            	<th field="agama" width="200" sortable="true"><strong>Agama </strong></th>
				 <th field="pendidikan" width="200" sortable="true"><strong>Pendidikan Terakhir  </strong></th>
				<th field="baca_tulis" width="200" sortable="true"><strong>Dapat Membaca Huruf  </strong></th>
				<th field="warga_negara" width="200" sortable="true"><strong>Kewarganegaraan </strong></th>
				<th field="alamat" width="200" sortable="true"><strong>Alamat </strong></th>
                <th field="kedudukan" width="200" sortable="true"><strong>Kedudukan Dalam Keluarga </strong></th>
                <th field="nik" width="200" sortable="true"><strong>Nomor KTP </strong></th>
                <th field="no_kk" width="200" sortable="true"><strong>Nomor KSK </strong></th>
                <th field="keterangan" width="200" sortable="true"><strong>Keterangan</strong></th>
				 
			</tr>
			
		</thead>
		 

	</table>


<div id="tb" style="padding:5px;height:auto">
	<div >		
    	<a href="<?php echo site_url("admin_menu"); ?>" class="easyui-linkbutton" iconCls="icon-back" plain="true"  >Kembali</a>
<!--		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru()" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a> 		
 		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus();">Hapus</a>-->
 		<a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak()">Cetak</a>
 		<a href="#" class="easyui-linkbutton" iconCls="icon-excel" plain="true" onclick="excel()">Excel</a>
		<br />
		 
	</div>
	
	<div>		
		<fieldset> <legend>Pencarian</legend>
		 
	 	 
		<input type="text" name="search_tentang" id="search_tentang" placeholder="Nama " />
		<input type="text" name="search_tgl_awal" id="search_tgl_awal" /> s.d 
		<input type="text" name="search_tgl_akhir" id="search_tgl_akhir" />
 		<a href="#" class="easyui-linkbutton" iconCls="icon-search" onclick="cari()">Cari</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-reset" onclick="reset_search()">Reset </a>
		</fieldset> 
		
	</div> 

</div>-->

<?php 
$this->load->view($controller."_form");
$this->load->view($controller."_js");
$this->load->view("js/global_js");
?>