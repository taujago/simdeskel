
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
				<th field="nip" width="200" sortable="true"><strong>NIP</strong> </th>
				<th field="niap" width="200" sortable="true"><strong>NIAP </strong> </th>
 				<th field="jk" width="20" sortable="true"><strong>JK </strong> </th>
		
 
				<th field="tmp_lahir" width="200" sortable="true"><strong>TMP LAHIR </strong></th>
				<th field="tgl_lahir" width="200" sortable="true"><strong>TGL LAHIR  </strong></th>
                <th field="agama" width="200" sortable="true"><strong>AGAMA  </strong></th>
                 <th field="pangkat" width="200" sortable="true"><strong>PANGKAT   </strong></th>
                <th field="golongan" width="200" sortable="true"><strong> GOLONGAN  </strong></th>
                 <th field="jabatan" width="200" sortable="true"><strong>JABATAN  </strong></th>
                <th field="pendidikan_terakhir" width="200" sortable="true"><strong>PENDIDIKAN TERAKHIR </strong></th>
                <th field="pengangkatan_nomor" width="200" sortable="true"><strong>NOMOR KEP. PENGANGKATAN   </strong></th>
                <th field="pengangkatan_tanggal" width="200" sortable="true"><strong>TGL KEP. PENGANGKATAN </strong></th>
                 <th field="pemberhentian_nomor" width="200" sortable="true"><strong>NOMOR KEP. PEMBERHENTIAN   </strong></th>
                <th field="pemberhentian_tanggal" width="200" sortable="true"><strong>TGL KEP. PEMBERHENTIAN </strong></th>
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
<!--  		<a href="#" class="easyui-linkbutton" iconCls="icon-excel" plain="true" onclick="excel()">Excel</a> -->
		<br />
		 
	</div>
	
	<div>		
		<fieldset> <legend>Pencarian</legend>
		 
	 	 
		<input type="text" size="40" name="search_nama" id="search_nama" placeholder="Nama Aparatur " />
		 
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