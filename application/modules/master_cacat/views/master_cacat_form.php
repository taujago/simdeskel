<div id="dlg" class="easyui-dialog" style="width:600px;height:200px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_cacat" id="id_cacat" />
		 	<fieldset >
			 <table>
				
				<tr>
			 		<td width="200px">Jenis cacat</td> 
			 		<td> : <?php echo form_dropdown("cacat_cat", $this->dm->arr_kategori_cacat(),'','id="cacat_cat"'); ?></td>
                    <td>&nbsp;</td>
			 	</tr>
				<tr>
				  <td>Cacat </td>
				  <td>: <input size="40" type="text" name="cacat" id="cacat" /></td>
				  <td>&nbsp;</td>
			   </tr>		 		 
			 	 
		     </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 