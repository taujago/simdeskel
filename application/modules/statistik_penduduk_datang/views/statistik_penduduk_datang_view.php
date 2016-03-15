<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $title ?>"  singleSelect="true" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead frozen="true">
			<tr>
				
				<th field="foto" width="80" sortable="true"><strong>Foto</strong></th>
				<th field="nik" width="150" sortable="true"><strong>NIK</strong></th>
				<th field="nama" width="200" sortable="true"><strong>Nama</strong></th>
				<th field="jk" width="20" sortable="true"><strong>JK</strong></th>
				<th field="umur" width="50" sortable="true"><strong>Umur</strong></th>
                	</tr>
		</thead>
		<thead>
			<tr>
				<th field="tmp_lahir" width="100" sortable="true"><strong>Tmp. Lahir</strong></th>
				<th field="tgl_lahir" width="100" sortable="true"><strong>Tgl. Lahir</strong></th>
				<th field="status_kependudukan2" width="150" sortable="true"><strong>Stat. Kependudukan</strong></th>
				
		
				
 				<th field="alamat" width="150" sortable="true" wrap="true"><strong>Alamat</strong></th>
 				<th field="rt" width="50" sortable="true"><strong>RT</strong></th>
				<th field="rw" width="50" sortable="true"><strong>RW</strong></th>
				<th field="dusun" width="100" sortable="true"><strong>Dusun</strong></th>
				<th field="pendidikan" width="100" sortable="true"><strong>Pendidikan</strong></th>
				<th field="pekerjaan" width="100" sortable="true"><strong>Pekerjaan</strong></th>
				<th field="warga_negara" width="100" sortable="true"><strong>WNI/WNA</strong></th>
 

 
 
			</tr>
		</thead>
	</table>


<div id="tb" style="padding:5px;height:auto">
	 <div >		<a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak();">Cetak</a>
		<!--<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru()" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-detail" plain="true" onclick="detail()">Detail</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus();">Hapus</a>
		
		<br /> -->
		 
	</div>
	
<!--	<div>		
		<fieldset> <legend>Pencarian</legend>
		<?php /*
		    echo form_dropdown('search_id_kecamatan',$arr_kecamatan,'',
	 
		    	 echo form_dropdown('search_id_desa',array('x'=>" - Semua Desa - "),'', 'id="search_id_desa"');
		    	 */
		?>

		<?php echo form_dropdown("search_status_kependudukan",
		$this->cm->add_arr_head($this->cm->arr_status_kependudukan,'x','- Semua Status Kependudukan - '),'',
		'id="search_status_kependudukan"'); ?>

		<?php echo form_dropdown("search_status_kawin",
		$this->cm->add_arr_head($this->cm->arr_status_kawin,'x','- Semua Status Pernikahan - '),'',
		'id="search_status_kawin"'); ?>
		

		<?php echo form_dropdown("search_jk",
		$this->cm->add_arr_head($this->cm->arr_jk,'x','- Semua jenis kelamin - '),'',
		'id="search_jk"'); ?>

		<input type="text" id="search_nik" name="search_nik" placeholder="NIK" />
		<input type="text" id="search_nama" name="search_nama" placeholder="Nama penduduk" />



		<a href="#" class="easyui-linkbutton" iconCls="icon-search" onclick="cari()">Cari</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-reset" onclick="reset_search()">Reset </a>
		</fieldset> 
		
	</div>  -->

</div>

<?php 
//$this->load->view($controller."_form");
$this->load->view($controller."_js");
$this->load->view("js/global_js");
?>