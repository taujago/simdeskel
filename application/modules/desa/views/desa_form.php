<div id="dlg" class="easyui-dialog" style="width:700px;height:400px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Desa</div>
		<form id="fm" method="post" novalidate>
		 	<fieldset >
		 		<legend><b>Data Desa</b></legend>
			 <table>
			 	<tr>
			 		<td width="200px">Provinsi</td> 
			 		<td> : <?php echo form_dropdown("id_provinsi",$arr_provinsi,'','id="id_provinsi" onchange="get_kota(this,\'#id_kota\',1)"') ?></td>
			 	</tr>
			 	
			 	<tr>
			 		<td width="200px">Kota</td> 
			 		<td> : <?php echo form_dropdown("id_kota",array(),'','id="id_kota" onchange="get_kecamatan(this,\'#id_kecamatan\',1)"') ?></td>
			 	</tr>
			 	<tr>
			 		<td width="200px">Kecamatan</td> 
			 		<td> : <?php echo form_dropdown("id_kecamatan",array(),'','id="id_kecamatan"') ?></td>
			 	</tr>
			 	 
 				<tr>
			 		<td width="200px">Desa</td> 
			 		<td> : <input type="text" name="desa" id="desa" /> </td>
			 	</tr>
		 
			 </table>
			 <input type="hidden" name="id" id="id" />
			</fieldset>
		 
		 
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 