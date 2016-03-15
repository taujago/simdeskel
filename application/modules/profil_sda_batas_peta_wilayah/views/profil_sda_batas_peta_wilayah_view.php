
<table id="tt" class="easyui-datagrid" style="width:1135px;height:375px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $header; ?>"  singleSelect="false" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				<th field="penetapan" width="300" sortable="true"><strong>Penetapan Batas</strong> </th>
                <th field="perdes" width="200" sortable="true"><strong>Perdes No</strong> </th>
                <th field="perda" width="200" sortable="true"><strong>Perda No</strong> </th>
				 <th field="peta" width="200" sortable="true"><strong>Peta Wilayah</strong> </th>
			</tr>
			
		</thead>
		 

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