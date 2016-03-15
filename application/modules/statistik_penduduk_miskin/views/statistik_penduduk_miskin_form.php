<div id="dlg" class="easyui-dialog" style="width:700px;height:300px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="title">Data Penduduk Miskin</div>
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Data Penduduk</b></legend>
			 <table>
				
			 	 		 
			 	<tr>
			 		<td > Nama penduduk</td> 
			 		<td> : <input type="text" name="nik" id="nik" style="width:400px;" /> <a  class="easyui-linkbutton" iconCls="icon-search" 
			 			 href="javascript:show_dialog('nik');">
			 			cari </a></td></td>
			 	</tr>
			 	 
		 </table>
		 
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 