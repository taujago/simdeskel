<div id="dlg" class="easyui-dialog" style="width:600px;height:200px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title"></div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_pekerjaan" id="id_pekerjaan" />
		 	<fieldset >
			 <table>
				<tr>
			 		<td width="200px">Pekerjaan </td> 
			 		<td> : <input size="40" type="text" name="pekerjaan" id="pekerjaan" /></td>
			 	</tr>		 		 
			 	<tr>
			 		<td width="200px">Sektor pekerjaan </td> 
			 		<td> : <?php 
					$arr =$this->cm->arr_tabel("master_sektor","id_sektor","sektor","sektor");
					$arr = $this->cm->add_arr_head($arr,"0","Tidak disektor manapun");
					echo form_dropdown("id_sektor", $arr); ?></td>
			 	</tr>
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 