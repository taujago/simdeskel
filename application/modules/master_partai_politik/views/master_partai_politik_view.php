
<table id="tt" class="easyui-datagrid" style="width:1200px;height:375px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="partai_politik" width="200" sortable="true"><strong>Partai Politik</strong> </th>
                <th field="lokal" width="100" sortable="true"><strong>Jumlah partai<br />politik lokal</strong> </th>
                <th field="nasional" width="100" sortable="true"><strong>Jumlah partai<br />politik<br />nasional</strong></th>
				<th field="pemilih" width="100" sortable="true"><strong>Jumlah <br />pemilih <br />pada pemilu<br />terakhir</strong> </th>
                <th field="alamat" width="200" sortable="true"><strong>Alamat sekretariat</strong> </th>
                <th field="hukum" width="100" sortable="true"><strong>Dasar hukum<br />pembentukan</strong> </th>
                <th field="jenis" width="120" sortable="true"><strong>Ruang lingkup <br />kegiatan (Jenis)</strong> </th>
                <th field="yakni" width="120" sortable="true"><strong>Ruang lingkup <br />kegiatan (Yakni)</strong> </th>
                <th field="underbow" width="120" sortable="true"><strong>Organisasi<br />underbow</strong> </th>
			</tr>
			
		</thead>
		 

	</table>


<div id="tb" style="padding:5px;height:auto">
	<div >		
   		<a class="easyui-linkbutton"  iconCls="icon-back" href="<?php echo site_url("master"); ?>" > Kembali </a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru()" >Tambah Baru</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a>
 		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus();">Hapus</a>
		<br />
		 
	</div>

</div>

<?php 
$this->load->view($controller."_form");
$this->load->view($controller."_js");
$this->load->view("js/global_js");
?>