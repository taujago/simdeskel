<div id="dlg" class="easyui-dialog" style="width:700px;height:400px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Desa</div>
		<form id="fm" method="post" novalidate>
		 	<fieldset >
		 		<legend><b>Data Desa</b></legend>
			 <table>
			 	 
			 	
			 
			 	<tr>
			 		<td width="200px">Kecamatan</td> 
			 		<td> : <?php echo form_dropdown("id_kecamatan",$arr_kecamatan,'','id="id_kecamatan" onchange="get_desa(this,\'#id_desa\',1)"') ?></td>
			 	</tr>
			 	 
 				<tr>
			 		<td width="200px">Desa</td> 
			 		<td> : <?php echo form_dropdown("id_desa",array(),'','id="id_desa"') ?></td>
			 	</tr>
		 		
		 		<tr>
			 		<td width="200px">Kode Dusun</td> 
			 		<td> : <input type="text" name="id" id="id" />  </td>
			 	</tr>
			 	<tr>
			 		<td width="200px"> Dusun</td> 
			 		<td> : <input type="text" name="dusun" id="dusun" />  </td>
			 	</tr>

			 </table>
			 
			</fieldset>
		 
		 
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 