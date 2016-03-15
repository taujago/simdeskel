
<table id="tt" class="easyui-datagrid" style="width:1135px;height:600px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
 				<th field="batas" width="100" sortable="true"><strong>Batas </strong> </th>
				<th field="desa" width="200" sortable="true"><strong>Desa / Kelurahan </strong> </th>
				<th field="kecamatan" width="200" sortable="true"><strong>Kecamatan </strong></th>
			 
				 
			</tr>
			
		</thead>  
        <!-- hello..    --> 
		 

	</table>


<div id="tb" style="padding:5px;height:auto">
	<div >		
		<a class="easyui-linkbutton"  iconCls="icon-back" href="<?php echo site_url("profil_menu"); ?>" > Kembali </a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()">Edit</a>
		<br />
		 
	</div>
	
	 

</div>

<?php 
$this->load->view($controller."_form");
$this->load->view($controller."_js");
$this->load->view("js/global_js");
?>