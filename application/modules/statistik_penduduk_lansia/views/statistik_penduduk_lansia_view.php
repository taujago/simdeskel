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
				<th field="tmp_lahir" width="100" sortable="true"><strong>Tmp. Lahir</strong></th>
				<th field="tgl_lahir" width="100" sortable="true"><strong>Tgl. Lahir</strong></th>
				<th field="status_kependudukan2" width="150" sortable="true"><strong>Stat. Kependudukan</strong></th>
				
			</tr>
		</thead>
		<thead>
			<tr>
				
 				<th field="alamat" width="150" sortable="true" wrap="true"><strong>Alamat</strong></th>
 				<th field="rt" width="50" sortable="true"><strong>RT</strong></th>
				<th field="rw" width="50" sortable="true"><strong>RW</strong></th>
				<th field="dusun" width="100" sortable="true"><strong>Dusun</strong></th>
				<th field="pendidikan" width="100" sortable="true"><strong>Pendidikan</strong></th>
				<th field="pekerjaan" width="100" sortable="true"><strong>Pekerjaan</strong></th>
				<th field="warga_negara" width="100" sortable="true"><strong>WNI/WNA</strong></th>
				<th field="status_hidup" width="100" sortable="true"><strong>Hidup/mati</strong></th>


 
 
			</tr>
		</thead>
	</table>


<div id="tb" style="padding:5px;height:auto">
	 <div >		
     
	 
     <a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak();">Cetak</a>
		 
		 
	</div>
	 

</div>

<?php 
//$this->load->view($controller."_form");
$this->load->view($controller."_js");
$this->load->view("js/global_js");
?>