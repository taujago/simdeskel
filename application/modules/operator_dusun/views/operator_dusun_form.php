<div id="dlg" class="easyui-dialog" style="width:700px;height:400px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle"><?php echo $dusun; ?></div>
		<form id="fm" method="post" novalidate>
		 	<fieldset >
		 		<legend><b>Data <?php echo $dusun; ?></b></legend>
			 <table>
			 	 
			 	
			 
			  
			 	 
 				 
		 		
		 		<tr>
			 		<td width="200px">Kode <?php echo $dusun; ?></td> 
			 		<td> : <input type="text" name="id_dusun" id="id_dusun" value="<?php echo  $this->session->userdata("operator_id_desa") ?>" />  </td>
			 	</tr>
			 	<tr>
			 		<td width="200px"> <?php echo $dusun; ?></td> 
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
	 