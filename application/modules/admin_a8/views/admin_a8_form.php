
<div id="dlg" class="easyui-dialog" style="width:900px;height:500px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="title"></div>
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Data Ekspedisi</b></legend>
			 <table width="790">
				
				<tr>
			 		<td width="186" > Tanggal Pengiriman</td> 
			 		<td width="582"> : <input type="text" name="tanggal" id="tanggal" /></td> 
			 	</tr>
			 	<tr class="masuk">
			 		<td >Nomor Surat</td> 
			 		<td> : <input type="text" name="surat_nomor" id="surat_nomor" /></td> 
			 	</tr>
			 	 	<tr class="masuk">
			 		<td > Tanggal Surat</td> 
			 		<td> : <input type="text" name="surat_tanggal" id="surat_tanggal" /></td> 
			 	</tr>
			 	<tr class="masuk">
			 		<td > Tujuan</td> 
			 		<td> : <input name="tujuan" type="text" id="tujuan" size="40" /></td> 
			 	</tr>
			 	<tr class="masuk">
			 		<td > Isi Singkat</td> 
			 		<td> : <input size="80" type="text" name="isi_singkat" id="isi_singkat" /></td> 
			 	</tr>
			 	<tr>
			 	  <td >Keterangan</td>
			 	  <td>: 
		 	      <input size="80" type="text" name="keterangan" id="keterangan" /></td>
		 	   </tr>
          </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 