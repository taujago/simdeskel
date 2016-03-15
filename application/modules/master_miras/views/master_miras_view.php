
<table id="tt" class="easyui-datagrid" style="width:1135px;height:375px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				<th field="ck" checkbox="true"></th>
				<th field="miras" width="700" sortable="true"><strong>Pemakaian MIRAS dan Narkoba</strong> </th>
				 
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