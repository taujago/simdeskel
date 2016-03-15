<div id="dlg" class="easyui-dialog" style="width:600px;height:300px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_orbitasi" id="id_orbitasi" />
		 	<fieldset >
			 <table>
				
				<tr>
			 		<td width="200px">Orbitasi </td> 
			 		<td> : <input size="40" type="text" name="orbitasi" id="orbitasi" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Nilai </td> 
			 		<td> : <input size="40" type="text" name="nilai" id="nilai" /></td>
			 	</tr>	
                <tr>
			 		<td width="200px">Satuan </td> 
			 		<td> : <?php echo form_dropdown("id_satuan", $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan")); ?></td>
			 	</tr>
                 <tr>
			 		<td width="200px">Ada /Tidak </td> 
			 		<td> : <?php 
					$arr = array(""=>"Kosongkan","1"=>"Ada","2"=>"Tidak");
					echo form_dropdown("pernyataan", $arr); ?></td>
			 	</tr>		 
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 