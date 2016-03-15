<div id="dlg" class="easyui-dialog" style="width:900px;height:400px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="title">Data Aparat </div>
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
 		  <legend><b>Biodata</b></legend>
			 <table width="757">
				
				<tr>
			 		<td width="200">Nama Penduduk  </td> 
			 		<td width="506"> :		 		    
		 		    <input  type="text" name="id_penduduk" id="id_penduduk" /></td>
                    <td></td>
			 	</tr>		 		 
			 	<tr>
			 		<td >Badan Hukum</td> 
			 		<td> : <input size="40" type="text" name="badan_hukum" id="badan_hukum" /></td><td width="35"></td>
			 	</tr>
			 	<tr>
			 		<td > Luas </td> 
			 		<td> : <input size="5" type="text" name="luas" id="luas" />m<sup>2</sup></td></td>
			 	</tr>
			 	<tr>
			 		<td >Status Tanah</td> 
			 		<td> : <?php echo form_dropdown("status_tanah",$this->dm->arr_status_tanah,'','id="status_tanah"') ?> </td></td>
			 	</tr>
			 	<tr>
			 	  <td >Ada sertifikat </td>
			 	  <td>: <?php echo form_dropdown("sertifikat",$this->dm->arr_ya_tidak,'','id="sertifikat"') ?></td>
			 	  <td>                
		 	   </tr>
			 	<tr>
			 		<td >Penggunaan</td> 
			 		<td> : <?php echo form_dropdown("penggunaan",$this->dm->arr_penggunaan,'','id="penggunaan"') ?></td></td>
			 	</tr>
			 	 	<tr>
			 		<td >Keterangan</td> 
			 		<td> : 
			 		  <input name="keterangan" type="text" id="keterangan" size="60" /></td></td>
			 	</tr>
			 	 
			 	 
		 </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 