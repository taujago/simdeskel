<div id="dlg" class="easyui-dialog" style="width:550px;height:300px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Kota</div>
		<form id="fm" method="post" novalidate>
		 	<fieldset >
		 		<legend><b>Data Kota</b></legend>
			 <table>
			 	<tr>
			 		<td width="200px">Provinsi</td> 
			 		<td> : <?php echo form_dropdown("id_provinsi",$arr_provinsi2) ?></td>
			 	</tr>
			 	
			 	<tr>
			 		<td width="200px">Kode Kota</td> 
			 		<td> : <input type="text" name="kode_kota" id="kode_kota" /> </td>
			 	</tr>
 				<tr>
			 		<td width="200px">Kota </td> 
			 		<td> : <input type="text" name="kota" id="kota" /> </td>
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
	 