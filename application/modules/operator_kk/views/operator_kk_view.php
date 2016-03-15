
<table id="grid_kk" class="easyui-datagrid" style="width:1135px;height:300px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $title ?>"  singleSelect="true" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				 
				
				<th field="no_kk" width="150" sortable="true"><strong>No. KK</strong> </th>
				<th field="nama" width="200" sortable="true"><strong>Nama KK</strong></th>
				<th field="alamat" width="200" sortable="true"><strong>Alamat</strong></th>
				<th field="rt" width="30" sortable="true"><strong>RT</strong></th>
				<th field="rw" width="30" sortable="true"><strong>RW</strong></th>
				<th field="dusun" width="100" sortable="true"><strong>Dusun</strong></th>
				<th field="desa" width="100" sortable="true"><strong>Desa</strong></th>
				<th field="kecamatan" width="100" sortable="true"><strong>Kecamatan</strong></th>
				<!-- <th field="jumlah" width="150" sortable="true"><strong>Jml. Anggota KK</strong></th>
 				-->
			</tr>
		</thead>
	</table>

<table id="grid_kk_anggota" class="easyui-datagrid" style="width:1135px;height:300px"
			url="<?php echo site_url("$controller/get_data_anggota")  ?>"
			title="Data Anggota Keluarga"  singleSelect="true" toolbar="#tb_kk"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				 
				<th field="urutan" width="60" sortable="true"><strong>No. Urut</strong></th>
				<th field="nik" width="150" sortable="true"><strong>NIK</strong></th>
				<th field="nama" width="200" sortable="true"><strong>Nama</strong></th>
				<th field="jk" width="30" sortable="true"><strong>JK</strong></th>
				<th field="ttl" width="200" sortable="true"><strong>TTL</strong></th>
				<th field="umur" width="100" sortable="true"><strong>Umur</strong></th>
				<th field="sebagai2" width="150" sortable="true"><strong>Sebagai</strong></th>
			<!-- 	<th field="anakke" width="100" sortable="true"><strong>Anak KE</strong></th> -->
				
				
 
			</tr>
		</thead>
	</table>
<div id="tb" style="padding:5px;height:auto">
	<div >		
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru()" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus();">Hapus</a>
 <!--        <a href="#" class="easyui-linkbutton" iconCls="icon-word" plain="true" onclick="word();">Word</a> -->
        <a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak();">Cetak KK</a>
        
        <a href="#" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="generate();">RE-GENERATE DATA KK</a>
		
		<br />
		 
	</div>
	
	<div>		
		<fieldset> <legend>Pencarian</legend>
<!--		<?php
		    echo form_dropdown('search_id_kecamatan',$arr_kecamatan,'',
		    'id="search_id_kecamatan" onchange="get_desa(this,\'#search_id_desa\')" ');
		 
		    	 echo form_dropdown('search_id_desa',array('x'=>" - Semua Desa - "),'', 'id="search_id_desa"');
		?> -->

		<input type="text" id="search_no_kk" name="search_no_kk" placeholder="Nomor KK" />

		<input type="text" id="search_nama" name="search_nama" placeholder="Nama Kepala Keluarga" />

		<a href="#" class="easyui-linkbutton" iconCls="icon-search" onclick="cari()">Cari</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-reset" onclick="reset_search()">Reset </a>
		</fieldset> 
		
	</div> 

</div>



<!-- section anggota keluarga --> 
 
 </div>


<div id="tb_kk" style="padding:5px;height:auto">
	<a href="#atas" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="tambah_anggota();">Tambah Anggota KK</a>
	<a href="#atas" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit_anggota();">Edit Anggota KK</a>
	<a href="#atas" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus_anggota();">Hapus Anggota KK</a>
</div>

<div class="modal">
<div id="tulisan">
Data sedang diproses. Harap menunggu.....
</div>
</div>


<style type="text/css">
#tulisan {
	border: 1px solid #000;
	position: absolute;
    width: 300px;
    height: 50px;
    top: 67%%;
    left: 42%;
    margin-left: -50px; /* margin is -0.5 * dimension */
    margin-top: -50px; 
    text-align: center;
}

.modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('<?php echo base_url("assets/images")."/ajax-loader.gif"; ?>') 
                50% 50% 
                no-repeat;
}
</style>

<?php 
$this->load->view($controller."_form");
$this->load->view($controller."_js");
//$this->load->view("js/global_js");
$this->load->view("search_penduduk_view");
$this->load->view("search_penduduk_js");
?>