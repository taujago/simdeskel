
<table id="tt" class="easyui-datagrid" style="width:1135px;height:375px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="lembaga" width="250" sortable="true"><strong>Lembaga kemasyarakatan</strong> </th>
                <th field="order" width="80" sortable="true"><strong>Urutan/<br />Order</strong> </th>
                <th field="unit" width="80" sortable="true"><strong>Jumlah<br />unit/<br />organisasi</strong> </th>
                <th field="ket1_teks" width="80" sortable="true"><strong>Ada/<br />Tidak ada</strong> </th>
                <th field="ket2_teks" width="80" sortable="true"><strong>Aktif/<br />Tidak aktif</strong> </th>
                
                <th field="hukum" width="110" sortable="true"><strong>Dasar hukum<br />pembentukan</strong> </th>
				<th field="alamat" width="250" sortable="true"><strong>Alamat kantor</strong></th>
                <th field="jenis" width="110" sortable="true"><strong>Ruang lingkup<br />kegiatan<br />(Jenis)</strong></th>
                <th field="yakni" width="110" sortable="true"><strong>Ruang lingkup<br />kegiatan<br />(Yakni)</strong></th>
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