<div id="dlg" class="easyui-dialog" style="width:700px;height:500px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Operator</div>
		<form id="fm" method="post" novalidate>
		 	<fieldset >
		 		<legend><b>Data Operator</b></legend>
			 <table>
			 	<tr>
			 		<td width="200px">Kecamatan</td> 
			 		<td> : 
			 			<?php
						    echo form_dropdown('id_kecamatan',$arr_kecamatan2,'',
						    'id="id_kecamatan" onchange="get_desa(this,\'#id_desa\')" ');
						?>
			 		</td>
			 	</tr>
			 	
			 	<tr>
			 		<td width="200px">Desa</td> 
			 		<td> : 

			 			<?php
						    	 echo form_dropdown('id_desa',array('x'=>" - Semua Desa - "),'', 'id="id_desa"');
						?>
			 		</td>
			 	</tr>
			  
 				<tr>
			 		<td width="200px">Username</td> 
			 		<td> : <input type="text" name="username" id="username" /> </td>
			 	</tr>
			 	<tr>
			 		<td width="200px">Password</td> 
			 		<td> : <input type="password" name="password" id="password" /> </td>
			 	</tr>
			 	<tr>
			 		<td width="200px">Password Lagi</td> 
			 		<td> : <input type="password" name="password2" id="password2" /> </td>
			 	</tr>
			 	<tr>
			 		<td width="200px">Nama</td> 
			 		<td> : <input type="text" name="nama" id="nama" /> </td>
			 	</tr>
			 	<tr>
			 		<td width="200px">No. HP</td> 
			 		<td> : <input type="text" name="no_hp" id="no_hp" /> </td>
			 	</tr>
			 		<tr>
			 		<td width="200px">Email </td> 
			 		<td> : <input type="text" name="email" id="email" /> </td>
			 	</tr>
		 
			 </table>
			 <input type="hidden" name="id_operator" id="id_operator" />
			</fieldset>
		 
		 
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 