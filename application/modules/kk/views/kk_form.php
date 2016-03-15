<div id="dlg" class="easyui-dialog" style="width:800px;height:400px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Kartu Keluarga</div>
		<form id="fm" method="post" novalidate>
		 	<fieldset >
		 		<legend><b>Data KK</b></legend>
			 <table>
 				<tr>
			 		<td width="200px">Nomo KK </td> 
			 		<td> : <input   name="no_kk" id="no_kk"/> </td>
			 	</tr>
			 	
			 	<tr>
			 		<td  >Kepala Keluarga</td> 
			 		<td> : <input type="text" name="id_penduduk" id="id_penduduk"  style="width:200px;"  /> </td>
			 	</tr>
			 	 
			 	<tr>
			 		<td  >Kecamatan</td> 
			 		<td> : 
			 			<?php
						    echo form_dropdown('id_kecamatan',$arr_kecamatan2,'',
						    'id="id_kecamatan" onchange="get_desa(this,\'#id_desa\')" ');
						?>
			 		</td>
			 	</tr>
			 	
			 	<tr>
			 		<td  >Desa</td> 
			 		<td> : 

			 			<?php
						    	 echo form_dropdown('id_desa',array('x'=>" - Semua Desa - "),'', 'id="id_desa"');
						?>
			 		</td>
			 	</tr>

 				<tr>
			 		<td >Alamat </td> 
			 		<td  valign="top"  > : <textarea  name="alamat" id="alamat" class="text ui-widget-content ui-corner-all"> </textarea></td> 
			 		
			 	</tr>
			 	
			 	<tr>
			 		<td >RT / RW </td> 
			 		<td> :  <input size="5" type="text" name="rt" id="rt" class="text ui-widget-content ui-corner-all"  />
		<input size="5" type="text" name="rw" id="rw" class="text ui-widget-content ui-corner-all"  /></td>
			 	</tr>
			 	 
		 
			 </table>
			 
			</fieldset>
		 
		 
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 
<!-- ===================================== anggota form section -->


<div id="dlg_anggota" class="easyui-dialog" style="width:500px;height:300px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Anggota Kartu Keluarga</div>
		<!-- <form id="fm_anggota" method="post" novalidate>
			<input  type="hidden"  name="no_kk_anggota" id="no_kk_anggota" />  
		 	<fieldset >
		 		<legend><b>Data Anggota KK</b></legend>
			 <table>
 				 
			 		 
			 		  
			  
			 	
			 	<tr>
			 		<td width="200px" >Nama Keluarga</td> 
			 		<td> :  <input type="text" name="id_penduduk_anggota" id="id_penduduk_anggota" /> </td>
			 	</tr>
			 	 
			 	 
			 	
			 	<tr>
			 		<td >Sebagai </td> 
			 		<td> :  <?php echo form_dropdown('sebagai',$this->cm->arr_sebagai,'','id="sebagai"') ?>
		 
			 	</tr>
			 	 
		 
			 </table>

			 <div id="boxanak" style="display:none;">

			 	<table>
			 		<tr>
			 		<td width="200px">Anak Ke </td> 
			 		<td> :  <input size="5" name="anakke" id="anakke" disabled="disabled" />		 
			 		</tr>
			 	</table>

			 </div>
			 
			</fieldset>
		 
		 
		</form> --> 



<table id="grid_kks" class="easyui-datagrid" style="width:950px;height:300px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $title ?>"  singleSelect="true" toolbar="#tb"
			rownumbers="true" pagination="true">
		<thead>
			<tr>
				 
				
				<th field="no_kk" width="150" sortable="true">No. KK </th>
				<th field="nama" width="200" sortable="true">Nama KK</th>
				<th field="alamat" width="200" sortable="true">Alamat</th>
				<th field="rt" width="30" sortable="true">RT</th>
				<th field="rw" width="30" sortable="true">RW</th>
				<th field="desa" width="100" sortable="true">Desa</th>
				<th field="kecamatan" width="100" sortable="true">Kecamatan</th>
				<th field="jumlah" width="50" sortable="true">Jumlah</th>
 
			</tr>
		</thead>
	</table>



	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan_anggota()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_anggota').dialog('close')">Cancel</a>
	</div>